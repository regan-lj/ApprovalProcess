# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://vagrantcloud.com/search.
  config.vm.box = "ubuntu/xenial64"


  config.vm.define "webuser" do |webuser|

    webuser.vm.hostname = "webuser"
    webuser.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    webuser.vm.network "private_network", ip: "192.168.2.11"
    webuser.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    webuser.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql

      # Change VM's webserver's configuration to use shared folder.
      # (Look inside website.conf for specifics.)
      cp /vagrant/website.conf /etc/apache2/sites-available/
      # install our website configuration and disable the default
      a2ensite website
      a2dissite 000-default
      service apache2 reload
      SHELL

  end

  config.vm.define "dbserver" do |dbserver|
    dbserver.vm.hostname = "dbserver"
    dbserver.vm.network "private_network", ip: "192.168.2.12"
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
    dbserver.vm.provision "shell", inline: <<-SHELL
       apt-get update

       # We create a shell variable MYSQL_PWD that contains the MySQL root password
       export MYSQL_PWD='insecure_mysqlroot_pw'

       # If you run the `apt-get install mysql-server` command
       # manually, it will prompt you to enter a MySQL root
       # password. The next two lines set up answers to the questions
       # the package installer would otherwise ask ahead of it asking,
       # so our automated provisioning script does not get stopped by
       # the software package management system attempting to ask the
       # user for configuration information.
       echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections
       echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections

       # Install the MySQL database server.
       apt-get -y install mysql-server

       # Run some setup commands to get the database ready to use.
       # First create a database.
       echo "CREATE DATABASE fvision;" | mysql

       # Then create a database user "webuser" with the given password.
       echo "CREATE USER 'webuser'@'%' IDENTIFIED BY 'insecure_db_pw';" | mysql

       # Grant all permissions to the database user "webuser" regarding
       # the "fvision" database that we just created, above.
       echo "GRANT ALL PRIVILEGES ON fvision.* TO 'webuser'@'%'" | mysql

       # Set the MYSQL_PWD shell variable that the mysql command will
       # try to use as the database password ...
       export MYSQL_PWD='insecure_db_pw'

       # ... and run all of the SQL within the setup-database.sql file,
       # which is part of the repository containing this Vagrantfile, so you
       # can look at the file on your host. The mysql command specifies both
       # the user to connect as (webuser) and the database to use (fvision).
       cat /vagrant/setup-database.sql | mysql -u webuser fvision

       # By default, MySQL only listens for local network requests,
       # i.e., that originate from within the dbserver VM. We need to
       # change this so that the webserver VM can connect to the
       # database on the dbserver VM. Use of `sed` is pretty obscure,
       # but the net effect of the command is to find the line
       # containing "bind-address" within the given `mysqld.cnf`
       # configuration file and then to change "127.0.0.1" (meaning
       # local only) to "0.0.0.0" (meaning accept connections from any
       # network interface).
       sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf

       # We then restart the MySQL server to ensure that it picks up
       # our configuration changes.
       service mysql restart
   SHELL


  end

  config.vm.define "webadmin" do |webadmin|

    webadmin.vm.hostname = "webadmin"
    webadmin.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"
    webadmin.vm.network "private_network", ip: "192.168.2.13"
    webadmin.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    webadmin.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql

      # Change VM's webserver's configuration to use shared folder.
      # (Look inside website-admin.conf for specifics.)
      cp /vagrant/website-admin.conf /etc/apache2/sites-available/
      # install our website configuration and disable the default
      a2ensite website-admin
      a2dissite 000-default
      service apache2 reload
      SHELL

  end


  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # NOTE: This will enable public access to the opened port
  # config.vm.network "forwarded_port", guest: 80, host: 8080

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine and only allow access
  # via 127.0.0.1 to disable public access
  # config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  # config.vm.network "private_network", ip: "192.168.33.10"

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
  # config.vm.provider "virtualbox" do |vb|
  #   # Display the VirtualBox GUI when booting the machine
  #   vb.gui = true
  #
  #   # Customize the amount of memory on the VM:
  #   vb.memory = "1024"
  # end
  #
  # View the documentation for the provider you are using for more
  # information on available options.

  # Enable provisioning with a shell script. Additional provisioners such as
  # Ansible, Chef, Docker, Puppet and Salt are also available. Please see the
  # documentation for more information about their specific syntax and use.
  # config.vm.provision "shell", inline: <<-SHELL
  #   apt-get update
  #   apt-get install -y apache2
  # SHELL
end
