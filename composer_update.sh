#!/bin/bash

# Missä kansiossa komento suoritetaan
DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

source $DIR/config/environment.sh

echo "Suoritetaan komento php composer.phar update"

# Suoritetaan php composer.phar update
ssh xbexbex@users2017.cs.helsinki.fi "
cd htdocs/$PROJECT_FOLDER
php composer.phar update
exit"

echo "Valmis! Composerin riippuvuuden on päivitetty kansiossa $USERNAME.users.cs.helsinki.fi/$PROJECT_FOLDER"
