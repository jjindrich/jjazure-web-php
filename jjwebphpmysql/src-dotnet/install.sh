wget https://packages.microsoft.com/config/ubuntu/20.04/packages-microsoft-prod.deb 
sudo dpkg -i packages-microsoft-prod.deb 

sudo apt update 
sudo apt install apt-transport-https dotnet-sdk-3.1 -y