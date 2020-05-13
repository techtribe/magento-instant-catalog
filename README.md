# Magento Instant Catalog
A Magento module that makes your catalog load nearly instant while SEO proof &amp; scales to >100k products

# How to develop
## Development environment
This development environment is the based on the Magento docker setup. Only sample data is added. For more information see https://devdocs.magento.com/cloud/docker/docker-development.html
### Prerequisites
We assume the following software is installed:
- PHP version 7.1 or later
- Composer
- Docker
- mutagen

### Initialisation
```
cd magento2/
composer install
bin/magento-docker up
bash mutagen.sh
```
Now wait about 60 sec for the filesystems to sync (Host and docker filesystems). Then run (This will take ~15min):

```
docker-compose run deploy cloud-deploy
docker-compose run deploy magento-command deploy:mode:set developer
```
Now the system should be working under the following URL:
http://magento2.docker & http://magento2.docker/admin

To be able to access the admin panel create a user:

```
bin/magento-docker bash
bin/magento admin:user:create
```
### Useful commands
```
bin/magento-docker stop
bin/magento-docker start
bin/magento-docker bash
mutagen sync list
```

# Possible issues
## KILLED message
If you ever face a killed message have a look here: https://stackoverflow.com/questions/44417159/docker-process-killed-with-cryptic-killed-message
## File changes don't effect the system
Check if mutagen is running by running this command:

`mutagen sync list`

You should see a sync config which is active. If not run:

`bash magento2/mutagen.sh`

# Contributors
