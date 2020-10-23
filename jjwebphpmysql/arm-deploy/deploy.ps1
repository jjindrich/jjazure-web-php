$rg = "php-mysql-rg"
az group create -n $rg -l westeurope

az deployment group create -g $rg --template-file deploy-mysql.json --parameters deploy-mysql.params.json
az deployment group create -g $rg --template-file deploy-vm.json --parameters deploy-vm.params.json
