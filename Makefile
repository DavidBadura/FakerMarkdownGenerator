help:                                                                           ## shows this help
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_\-\.]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.PHONY: phpcs-check
phpcs-check:                                                                   ## run phpcs
	vendor/bin/phpcs

.PHONY: phpcs-fix
phpcs-fix:                                                                     ## run phpcs fixer
	vendor/bin/phpcbf

.PHONY: phpstan
phpstan:                                                                        ## run phpstan static code analyser
	vendor/bin/phpstan analyse

.PHONY: static
static: phpcs-check phpstan                                                     ## run static analyser

.PHONY: dev
dev: static                                                                     ## run dev tools
