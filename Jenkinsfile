pipeline {
    agent any

    environment {
        IMAGE_NAME = 'laravel-notes'
        IMAGE_TAG = 'latest'
    }

    stages {
        stage('Build Docker Image') {
            steps {
                sh 'docker build -t $IMAGE_NAME:$IMAGE_TAG .'
            }
        }

        stage('Run Container') {
            steps {
                sh '''
                    docker stop laravel-notes || true
                    docker rm laravel-notes || true
                    docker run -d -p 8000:80 \
                        -v $(pwd)/storage:/var/www/html/storage \
                        -v $(pwd)/.env:/var/www/html/.env \
                        --name laravel-notes $IMAGE_NAME:$IMAGE_TAG
                '''
            }
        }
    }

    post {
        always {
            echo '✅ Pipeline execution complete.'
        }
    }
}

