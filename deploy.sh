#!/bin/bash
echo "Siirretään tiedostot users-palvelimelle..."
rsync -z -r /mnt/c/Users/Burilas/Documents/GitHub/Tsoha-Bootstrap/app /mnt/c/Users/Burilas/Documents/GitHub/Tsoha-Bootstrap/assets /mnt/c/Users/Burilas/Documents/GitHub/Tsoha-Bootstrap/config /mnt/c/Users/Burilas/Documents/GitHub/Tsoha-Bootstrap/lib /mnt/c/Users/Burilas/Documents/GitHub/Tsoha-Bootstrap/sql /mnt/c/Users/Burilas/Documents/GitHub/Tsoha-Bootstrap/vendor /mnt/c/Users/Burilas/Documents/GitHub/Tsoha-Bootstrap/index.php /mnt/c/Users/Burilas/Documents/GitHub/Tsoha-Bootstrap/composer.json uch:htdocs/tsoha
echo "Valmis!"
echo "Suoritetaan komento php composer.phar dump-autoload..."
ssh uch "
cd htdocs/tsoha/
php composer.phar dump-autoload
exit"
echo "Valmis! Sovelluksesi on nyt valmiina."