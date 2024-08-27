pipeline {
    agent any    
    stages {
        stage('Checkout') {
            steps {
                // Checkout your source code from version control
                git 'git@github.com:hedia1bencheikh/PFE.git'
            }
        }
        stage('sonar'){
        	steps{
            	withSonarQubeEnv(installationName:'sq1'){
                sh'./mvw clean org.sonarsource.scanner.maven:sonar-maven-plugin:3.9.0.2155:sonar'
                }
            }
        }
       }
       
}
