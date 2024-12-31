pipeline {
    agent any

    environment {
        APP_NAME = "shop-01"
        NGROK_API_URL = "http://127.0.0.1:4040/api/tunnels"
        DEPLOY_ENDPOINT = ""
        DOCKER_IMAGE = "sayid740/shop-01:latest"
    }

    stages {
        stage('Prepare') {
            steps {
                script {
                    checkout scm
                    withCredentials([
                        usernamePassword(credentialsId: 'DOCKER_HUB_USERNAME', usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD')
                    ]) {
                        bat '''
                            echo $DOCKER_PASSWORD | docker login -u $DOCKER_USERNAME --password-stdin
                        '''
                    }
                }
            }
        }

        stage('Build and Push') {
            steps {
                script {
                    sh '''
                        docker-compose -f docker-compose.yml build
                        docker tag ${DOCKER_IMAGE} ${DOCKER_IMAGE}
                        docker push ${DOCKER_IMAGE}
                    '''
                }
            }
        }

        stage('Fetch ngrok URL') {
            steps {
                script {
                    def response = httpRequest(url: NGROK_API_URL, acceptType: 'APPLICATION_JSON')
                    def json = readJSON(text: response.content)
                    def publicUrl = json.tunnels.find { it.proto == 'https' }?.public_url

                    if (!publicUrl) {
                        error "Failed to fetch ngrok URL. Ensure ngrok is running."
                    }

                    echo "Using ngrok URL: ${publicUrl}"
                    env.DEPLOY_ENDPOINT = publicUrl
                }
            }
        }

        stage('Deploy') {
            steps {
                script {
                    sh '''
                        echo "Deploying application via ngrok..."
                        curl -X POST ${DEPLOY_ENDPOINT}/deploy-endpoint -H "Authorization: Bearer <TOKEN>" -d '{"action": "deploy"}'

                        echo "Running PHP artisan commands..."
                        curl -X POST ${DEPLOY_ENDPOINT}/artisan-endpoint -H "Authorization: Bearer <TOKEN>" -d '{
                            "commands": [
                                "php artisan migrate --force",
                                "php artisan config:cache",
                                "php artisan route:cache"
                            ]
                        }'
                    '''
                }
            }
        }

        stage('Verify') {
            steps {
                script {
                    sh '''
                        echo "Verifying deployment..."
                        curl -I ${DEPLOY_ENDPOINT} || exit 1
                    '''
                }
            }
        }
    }

    post {
        always {
            script {
                sh 'docker logout'
            }
        }
    }
}






