from fabric.api import *

env.user = 'mfcc'
env.hosts = ['budvar.mfcc.cz']
env.password = 'ecAwm4quik1'

staging_dir = '/domains/tst.somersbycider.cz/public'
production_dir = '/domains/somersbycider.cz/public'
    
def deploy(version="staging"):
    if version == 'staging':
        with cd(staging_dir):
            run("git pull origin develop")
    elif version == 'production':
        with cd(production_dir):
            run("git pull origin master")
    elif version == 'current':
                my_branch = local('git rev-parse --abbrev-ref HEAD', capture=True)
                with cd(staging_dir):
                    run("git fetch")
                    run("git checkout " + my_branch)
                    run("git pull origin " + my_branch)
            
def update_db(version="staging"):
    if version == 'staging':
        with cd(staging_dir):
            run("php vendor/bin/doctrine orm:schema-tool:update --force")
    elif version == 'production':
        with cd(production_dir):
            run("php vendor/bin/doctrine orm:schema-tool:update --force")
            
def check_db(version="staging"):
    if version == 'staging':
        with cd(staging_dir):
            run("php vendor/bin/doctrine orm:schema-tool:update --dump-sql")
    elif version == 'production':
        with cd(production_dir):
            run("php vendor/bin/doctrine orm:schema-tool:update --dump-sql")