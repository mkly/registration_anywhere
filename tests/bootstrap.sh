mysql -u travis -e 'drop database if exists concrete5_tests; create database concrete5_tests';
rm -rf core
mkdir -p core/concrete5
git clone https://github.com/concrete5/concrete5.git ./core/concrete5
cp -a ./install ./core/concrete5/web/config/
cp -a ../dist/registration_anywhere ./core/concrete5/web/packages/
./core/concrete5/cli/install-concrete5.php --config="./test-config.php"
