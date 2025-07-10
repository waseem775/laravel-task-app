pipeline {
    agent any

    environment {
        IMAGE_NAME = "waseem775/laravel-task-app"
        IMAGE_TAG = "latest"
    }

    stages {
        stage('Clone repository') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker image') {
            steps {
                sh 'docker build -t $IMAGE_NAME:$IMAGE_TAG .'
            }
        }

        stage('Run Container') {
            steps {
                sh '''
                    docker stop laravel-notes || true
                    docker rm laravel-notes || true
                    docker run -d -p 8000:80 --name laravel-notes $IMAGE_NAME:$IMAGE_TAG
                '''
            }
        }
    }

    post {
        always {
            echo 'Pipeline execution complete.'
        }
    }
}

