pipeline {
    agent any  // Use any agent, or a specific label if needed

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
                    sh "docker login -u ${DOCKER_USERNAME} -p ${DOCKER_PASSWORD}"
                }
            }
        }

        stage('Build') {
            agent none  // Don't use agent for this stage
            steps {
                script {
                    // Use docker container in this stage
                    docker.image('php:8.2-fpm-alpine').inside {
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
