pipeline {
    agent {
        docker {
            image 'php:8.2-fpm-alpine'
        }
    }

    stages {
        stage('Prepare') {
            steps {
                script {
                    checkout scm
                }
                withCredentials([usernamePassword(credentialsId: 'docker-credentials', usernameVariable: 'DOCKER_HUB_USERNAME', passwordVariable: 'DOCKER_HUB_PASSWORD')]) {
                    sh '''
                        echo "Logging into Docker Hub..."
                        echo $DOCKER_HUB_PASSWORD | docker login -u $DOCKER_HUB_USERNAME --password-stdin
                    '''
                }
            }
        }

        stage('Build') {
            steps {
                sh '''
                    echo "Building Docker image..."
                    docker-compose -f docker-compose.yml build
                '''

                sh '''
                    echo "Pushing Docker image to Docker Hub..."
                    docker tag $DOCKER_HUB_USERNAME/$APP_NAME:$BUILD_NUMBER $DOCKER_HUB_USERNAME/$APP_NAME:latest
                    docker push $DOCKER_HUB_USERNAME/$APP_NAME:$BUILD_NUMBER
                    docker push $DOCKER_HUB_USERNAME/$APP_NAME:latest
                '''
            }
        }

        stage('Deploy') {
            steps {
                withCredentials([sshUserPrivateKey(credentialsId: 'deploy-key', keyFileVariable: 'DEPLOY_KEY')]) {
                    sh '''
                        echo "Deploying application..."
                        ssh -i $DEPLOY_KEY $DEPLOY_USER@$DEPLOY_SERVER << 'ENDSSH'
                        cd /var/www/html
                        docker pull $DOCKER_HUB_USERNAME/$APP_NAME:latest
                        docker-compose down
                        docker-compose up -d
                        docker exec laravel-app php artisan migrate --force
                        docker exec laravel-app php artisan config:cache
                        docker exec laravel-app php artisan route:cache
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


