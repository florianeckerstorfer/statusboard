CHECK          = \033[32m✔\033[39m

deploy:
	@echo "Deploying website to server...        \c"
	@rsync -avq --delete-after ./ han:/var/www/statusboard.braincrafted.com
	@echo "${CHECK} Done"
