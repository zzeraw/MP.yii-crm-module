exception 'CDbException' with message 'CDbConnection failed to open the DB connection: SQLSTATE[HY000] [2002] No such file or directory' in /Users/paveldanilov/Sites/sites.dev/yii-crm-module/framework/1.1.16/db/CDbConnection.php:402
Stack trace:
#0 /Users/paveldanilov/Sites/sites.dev/yii-crm-module/framework/1.1.16/db/CDbConnection.php(347): CDbConnection->open()
#1 /Users/paveldanilov/Sites/sites.dev/yii-crm-module/framework/1.1.16/db/CDbConnection.php(325): CDbConnection->setActive(true)
#2 /Users/paveldanilov/Sites/sites.dev/yii-crm-module/framework/1.1.16/base/CModule.php(394): CDbConnection->init()
#3 /Users/paveldanilov/Sites/sites.dev/yii-crm-module/framework/1.1.16/base/CModule.php(103): CModule->getComponent('db')
#4 /Users/paveldanilov/Sites/sites.dev/yii-crm-module/protected/commands/InitialDbMigrationCommand.php(7): CModule->__get('db')
#5 /Users/paveldanilov/Sites/sites.dev/yii-crm-module/framework/1.1.16/console/CConsoleCommandRunner.php(71): InitialDbMigrationCommand->run(Array)
#6 /Users/paveldanilov/Sites/sites.dev/yii-crm-module/framework/1.1.16/console/CConsoleApplication.php(92): CConsoleCommandRunner->run(Array)
#7 /Users/paveldanilov/Sites/sites.dev/yii-crm-module/framework/1.1.16/base/CApplication.php(184): CConsoleApplication->processRequest()
#8 /Users/paveldanilov/Sites/sites.dev/yii-crm-module/framework/1.1.16/yiic.php(33): CApplication->run()
#9 /Users/paveldanilov/Sites/sites.dev/yii-crm-module/protected/yiic.php(9): require_once('/Users/paveldan...')
#10 {main}