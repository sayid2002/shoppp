pipeline {
    agent {
            docker {
                image 'docker:latest'
                args '--privileged -v /var/run/docker.sock:/var/run/docker.sock'
            }
        }

    stages {
        stage('Prepare') {
            steps {
                script {
                    checkout scm
                }
                withCredentials([
                    usernamePassword(credentialsId: 'DOCKER_HUB_USERNAME', usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD')
                ]) {
                    // Here, DOCKER_USERNAME will be the value of your Docker Hub username,
                    // and DOCKER_PASSWORD will be the value of your Docker Hub password.
                    sh '''
                        echo "Logging into Docker Hub..."
                        mkdir -p $HOME/.docker
                        chmod 700 $HOME/.docker
                        echo "$DOCKER_PASSWORD" | docker login -u "$DOCKER_USERNAME" --password-stdin
                    '''
                }
            }
        }

        stage('Build') {
            steps {
                script {
                    // Use docker container in this stage
                    docker.image('php:8.2-fpm-alpine').inside('--user root') {
                        sh '''
                            echo "Building Docker image..."
                            apk add --no-cache docker-compose
                            docker-compose -f docker-compose.yml build
                        '''

                        sh '''
                            echo "Pushing Docker image to Docker Hub..."
                            docker tag sayid740/shop-01:latest sayid740/shop-01:latest
                            docker push sayid740/shop-01:latest
                        '''
                    }
                }
            }
        }

        stage('Deploy') {
            steps {
                withCredentials([sshUserPrivateKey(credentialsId: 'deploy-key', keyVariable: 'DEPLOY_KEY')]) {
                    sh '''
                        echo "Deploying application..."
                        ssh -i $DEPLOY_KEY $DEPLOY_USER@$DEPLOY_SERVER << 'ENDSSH'
                        cd /var/www/html
                        docker pull sayid740/shop-01:latest
                        docker-compose down
                        docker-compose up -d
                        docker exec shop-01 php artisan migrate --force
                        docker exec shop-01 php artisan config:cache
                        docker exec shop-01 php artisan route:cache
                        ENDSSH
                    '''
                }
            }
        }

        stage('Verify') {
            steps {
                sh '''
                    ssh $DEPLOY_USER@$DEPLOY_SERVER "docker ps | grep $APP_NAME"
                '''
            }
        }
    }

    post {
        always {
            steps {
                sh 'docker logout'
            }
        }
    }
}
