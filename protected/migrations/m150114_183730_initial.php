<?php

class m150114_183730_initial extends CDbMigration
{
	public function up()
	{
	    $this->createTable('crm_companies', array(
	        'id'=>'pk',
	        'title'=>'varchar(500) NOT NULL',
	        'web'=>'varchar(200) DEFAULT NULL',
	        'address'=>'varchar(1000) DEFAULT NULL',
	        'created_user_id'=>'int(11) NOT NULL',
	        'created_user_name'=>'varchar(500) NOT NULL',
	        'created_datetime'=>'datetime NOT NULL',
	        'created_ip'=>'varchar(500) DEFAULT NULL',
	        'last_modified_user_id'=>'int(11) NOT NULL',
	        'last_modified_user_name'=>'varchar(500) NOT NULL',
	        'last_modified_datetime'=>'datetime NOT NULL',
	        'last_modified_ip'=>'varchar(500) DEFAULT NULL',
	    ), '');

	    $this->createIndex('idx_last_modified_user_id', 'crm_companies', 'last_modified_user_id', FALSE);

	    $this->createIndex('idx_created_user_id', 'crm_companies', 'created_user_id', FALSE);

	    $this->createTable('crm_company_email_relations', array(
	        'type_id'=>'int(11) NOT NULL',
	        'company_id'=>'int(11) NOT NULL',
	    ), '');

	    $this->createIndex('idx_company_id', 'crm_company_email_relations', 'company_id', FALSE);

	    $this->createIndex('idx_type_id', 'crm_company_email_relations', 'type_id', FALSE);

	    $this->createTable('crm_company_phone_relations', array(
	        'type_id'=>'int(11) NOT NULL',
	        'company_id'=>'int(11) NOT NULL',
	    ), '');

	    $this->createIndex('idx_company_id', 'crm_company_phone_relations', 'company_id', FALSE);

	    $this->createIndex('idx_type_id', 'crm_company_phone_relations', 'type_id', FALSE);

	    $this->createTable('crm_contact_email_relations', array(
	        'type_id'=>'int(11) NOT NULL',
	        'contact_id'=>'int(11) NOT NULL',
	    ), '');

	    $this->createIndex('idx_contact_id', 'crm_contact_email_relations', 'contact_id', FALSE);

	    $this->createIndex('idx_type_id', 'crm_contact_email_relations', 'type_id', FALSE);

	    $this->createTable('crm_contact_phone_relations', array(
	        'type_id'=>'int(11) NOT NULL',
	        'contact_id'=>'int(11) NOT NULL',
	    ), '');

	    $this->createIndex('idx_contact_id', 'crm_contact_phone_relations', 'contact_id', FALSE);

	    $this->createIndex('idx_type_id', 'crm_contact_phone_relations', 'type_id', FALSE);

	    $this->createTable('crm_contacts', array(
	        'id'=>'pk',
	        'name'=>'varchar(500) NOT NULL',
	        'job_title'=>'varchar(500) DEFAULT NULL',
	        'skype'=>'varchar(200) DEFAULT NULL',
	        'note'=>'mediumtext DEFAULT NULL',
	        'created_user_id'=>'int(11) NOT NULL',
	        'created_user_name'=>'varchar(500) NOT NULL',
	        'created_datetime'=>'datetime NOT NULL',
	        'created_ip'=>'varchar(500) DEFAULT NULL',
	        'last_modified_user_id'=>'int(11) NOT NULL',
	        'last_modified_user_name'=>'varchar(500) NOT NULL',
	        'last_modified_datetime'=>'datetime NOT NULL',
	        'last_modified_ip'=>'varchar(500) DEFAULT NULL',
	    ), '');

	    $this->createIndex('idx_last_modified_user_id', 'crm_contacts', 'last_modified_user_id', FALSE);

	    $this->createIndex('idx_created_user_id', 'crm_contacts', 'created_user_id', FALSE);

	    $this->createTable('crm_dealing_status_logs', array(
	        'id'=>'pk',
	        'dealing_id'=>'int(11) DEFAULT NULL',
	        'status_id'=>'int(11) NOT NULL',
	        'user_id'=>'int(11) NOT NULL',
	        'user_name'=>'varchar(500) NOT NULL',
	        'datetime'=>'datetime NOT NULL',
	        'ip'=>'varchar(500) DEFAULT NULL',
	    ), '');

	    $this->createIndex('idx_user_id', 'crm_dealing_status_logs', 'user_id', FALSE);

	    $this->createIndex('idx_dealing_id', 'crm_dealing_status_logs', 'dealing_id', FALSE);

	    $this->createIndex('idx_status_id', 'crm_dealing_status_logs', 'status_id', FALSE);

	    $this->createTable('crm_dealing_statuses', array(
	        'id'=>'pk',
	        'title'=>'varchar(200) NOT NULL',
	        'color'=>"varchar(20) NOT NULL DEFAULT '#ffffff'",
	        'sorting'=>'int(11) DEFAULT NULL',
	    ), '');

	    $this->insertMultiple('crm_dealing_statuses',
	    	array(
                array('title' => 'Первичный контакт'),
                array('title' => 'Переговоры'),
                array('title' => 'Принимают решение'),
                array('title' => 'Согласование договора'),
                array('title' => 'Успешно реализовано'),
                array('title' => 'Закрыто и не реализовано'),
            )
        );

	    $this->createTable('crm_dealing_tag_names', array(
	        'id'=>'pk',
	        'name'=>'varchar(200) NOT NULL',
	        'count'=>'int(11) NOT NULL',
	    ), '');

	    $this->createTable('crm_dealing_tag_relations', array(
	        'dealing_id'=>'int(11) NOT NULL',
	        'tag_id'=>'int(11) NOT NULL',
	    ), '');

	    $this->createIndex('idx_tag_id', 'crm_dealing_tag_relations', 'tag_id', FALSE);

	    $this->createIndex('idx_dealing_id', 'crm_dealing_tag_relations', 'dealing_id', FALSE);

	    $this->createTable('crm_dealings', array(
	        'id'=>'pk',
	        'contact_id'=>'int(11) DEFAULT NULL',
	        'title'=>'varchar(500) NOT NULL',
	        'budget'=>'decimal(10,2) DEFAULT NULL',
	        'responsible_user_id'=>'int(11) NOT NULL',
	        'status_id'=>'int(11) NOT NULL',
	        'note'=>'mediumtext DEFAULT NULL',
	        'created_user_id'=>'int(11) NOT NULL',
	        'created_user_name'=>'varchar(500) NOT NULL',
	        'created_datetime'=>'datetime NOT NULL',
	        'created_ip'=>'varchar(500) DEFAULT NULL',
	        'last_modified_user_id'=>'int(11) NOT NULL',
	        'last_modified_user_name'=>'varchar(500) NOT NULL',
	        'last_modified_datetime'=>'datetime NOT NULL',
	        'last_modified_ip'=>'varchar(500) DEFAULT NULL',
	    ), '');

	    $this->createIndex('idx_last_modified_user_id', 'crm_dealings', 'last_modified_user_id', FALSE);

	    $this->createIndex('idx_contact_id', 'crm_dealings', 'contact_id', FALSE);

	    $this->createIndex('idx_responsible_user_id', 'crm_dealings', 'responsible_user_id', FALSE);

	    $this->createIndex('idx_status_id', 'crm_dealings', 'status_id', FALSE);

	    $this->createIndex('idx_created_user_id', 'crm_dealings', 'created_user_id', FALSE);

	    $this->createTable('crm_email_types', array(
	        'id'=>'pk',
	        'title'=>'varchar(200) NOT NULL',
	        'sorting'=>'int(11) DEFAULT NULL',
	    ), '');

	    $this->insertMultiple('crm_email_types',
	    	array(
                array('title' => 'Рабочий'),
                array('title' => 'Домашний'),
            )
        );

	    $this->createTable('crm_log_actions', array(
	        'id'=>'pk',
	        'name'=>'varchar(200) NOT NULL',
	        'alias'=>'varchar(200) NOT NULL',
	    ), '');

	    $this->createTable('crm_logs', array(
	        'id'=>'pk',
	        'action_id'=>'int(11) NOT NULL',
	        'user_id'=>'int(11) NOT NULL',
	        'user_name'=>'varchar(500) NOT NULL',
	        'datetime'=>'datetime NOT NULL',
	        'ip'=>'varchar(500) DEFAULT NULL',
	        'before_data'=>'mediumtext NOT NULL',
	        'after_data'=>'mediumtext NOT NULL',
	        'restore_flag'=>'tinyint(1) NOT NULL',
	        'restore_user_id'=>'int(11) NOT NULL',
	        'restore_user_name'=>'int(11) DEFAULT NULL',
	        'restore_datetime'=>'datetime NOT NULL',
	        'restore_ip'=>'varchar(500) DEFAULT NULL',
	    ), '');

	    $this->createIndex('idx_restore_user_id', 'crm_logs', 'restore_user_id', FALSE);

	    $this->createIndex('idx_action_id', 'crm_logs', 'action_id', FALSE);

	    $this->createIndex('idx_user_id', 'crm_logs', 'user_id', FALSE);

	    $this->createTable('crm_phone_types', array(
	        'id'=>'pk',
	        'title'=>'varchar(200) NOT NULL',
	        'sorting'=>'int(11) DEFAULT NULL',
	    ), '');

	    $this->insertMultiple('crm_phone_types',
	    	array(
                array('title' => 'Рабочий'),
                array('title' => 'Рабочий прямой'),
                array('title' => 'Мобильный'),
                array('title' => 'Факс'),
                array('title' => 'Домашний'),
                array('title' => 'Другой'),
            )
        );

	    $this->createTable('crm_task_status_logs', array(
	        'id'=>'pk',
	        'task_id'=>'int(11) DEFAULT NULL',
	        'status_id'=>'int(11) NOT NULL',
	        'user_id'=>'int(11) NOT NULL',
	        'user_name'=>'varchar(500) NOT NULL',
	        'datetime'=>'datetime NOT NULL',
	        'ip'=>'varchar(500) DEFAULT NULL',
	    ), '');

	    $this->createIndex('idx_user_id', 'crm_task_status_logs', 'user_id', FALSE);

	    $this->createIndex('idx_task_id', 'crm_task_status_logs', 'task_id', FALSE);

	    $this->createIndex('idx_status_id', 'crm_task_status_logs', 'status_id', FALSE);

	    $this->createTable('crm_task_statuses', array(
	        'id'=>'pk',
	        'title'=>'varchar(200) NOT NULL',
	        'color'=>"varchar(20) NOT NULL DEFAULT '#ffffff'",
	        'sorting'=>'int(11) DEFAULT NULL',
	    ), '');

	    $this->insertMultiple('crm_task_statuses',
	    	array(
                array('title' => 'Не просмотрена'),
                array('title' => 'Просмотрена'),
                array('title' => 'Завершена'),
            )
        );

	    $this->createTable('crm_task_types', array(
	        'id'=>'pk',
	        'name'=>'varchar(200) NOT NULL',
	        'sorting'=>'int(11) DEFAULT NULL',
	    ), '');

	    $this->insertMultiple('crm_task_types',
	    	array(
                array('title' => 'Напоминание'),
                array('title' => 'Встреча'),
                array('title' => 'Прочее'),
            )
        );

	    $this->createTable('crm_tasks', array(
	        'id'=>'pk',
	        'status_id'=>'int(11) NOT NULL',
	        'type_id'=>'int(11) DEFAULT NULL',
	        'custom_type_name'=>'varchar(200) DEFAULT NULL',
	        'date'=>'date DEFAULT NULL',
	        'time'=>'int(11) DEFAULT NULL',
	        'contact_id'=>'int(11) DEFAULT NULL',
	        'dealing_id'=>'int(11) DEFAULT NULL',
	        'text'=>'mediumtext DEFAULT NULL',
	        'result'=>'mediumtext NOT NULL',
	        'created_user_id'=>'int(11) NOT NULL',
	        'created_user_name'=>'varchar(500) NOT NULL',
	        'created_datetime'=>'datetime NOT NULL',
	        'created_ip'=>'varchar(500) DEFAULT NULL',
	        'last_modified_user_id'=>'int(11) NOT NULL',
	        'last_modified_user_name'=>'varchar(500) NOT NULL',
	        'last_modified_datetime'=>'datetime NOT NULL',
	        'last_modified_ip'=>'varchar(500) DEFAULT NULL',
	    ), '');

	    $this->createIndex('idx_last_modified_user_id', 'crm_tasks', 'last_modified_user_id', FALSE);

	    $this->createIndex('idx_status_id', 'crm_tasks', 'status_id', FALSE);

	    $this->createIndex('idx_type_id', 'crm_tasks', 'type_id', FALSE);

	    $this->createIndex('idx_contact_id', 'crm_tasks', 'contact_id', FALSE);

	    $this->createIndex('idx_dealing_id', 'crm_tasks', 'dealing_id', FALSE);

	    $this->createIndex('idx_created_user_id', 'crm_tasks', 'created_user_id', FALSE);

	    $this->createTable('crm_users', array(
	        'id'=>'pk',
	        'name'=>'varchar(500) NOT NULL',
	        'email'=>'varchar(300) DEFAULT NULL',
	        'mobile_phone'=>'varchar(50) DEFAULT NULL',
	        'work_phone'=>'varchar(50) DEFAULT NULL',
	        'note'=>'mediumtext DEFAULT NULL',
	        'photo'=>'varchar(200) DEFAULT NULL',
	        'created_user_id'=>'int(11) NOT NULL',
	        'created_user_name'=>'varchar(500) NOT NULL',
	        'created_datetime'=>'datetime NOT NULL',
	        'created_ip'=>'varchar(500) DEFAULT NULL',
	        'last_modified_user_id'=>'int(11) NOT NULL',
	        'last_modified_user_name'=>'varchar(500) NOT NULL',
	        'last_modified_datetime'=>'datetime NOT NULL',
	        'last_modified_ip'=>'varchar(500) DEFAULT NULL',
	    ), '');

	    $this->createIndex('idx_last_modified_user_id', 'crm_users', 'last_modified_user_id', FALSE);

	    $this->createIndex('idx_created_user_id', 'crm_users', 'created_user_id', FALSE);

	    $this->addForeignKey('fk_crm_companies_crm_users_last_modified_user_id', 'crm_companies', 'last_modified_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_companies_crm_users_created_user_id', 'crm_companies', 'created_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_company_email_relations_crm_companies_company_id', 'crm_company_email_relations', 'company_id', 'crm_companies', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_company_email_relations_crm_email_types_type_id', 'crm_company_email_relations', 'type_id', 'crm_email_types', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_company_phone_relations_crm_companies_company_id', 'crm_company_phone_relations', 'company_id', 'crm_companies', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_company_phone_relations_crm_phone_types_type_id', 'crm_company_phone_relations', 'type_id', 'crm_phone_types', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_contact_email_relations_crm_contacts_contact_id', 'crm_contact_email_relations', 'contact_id', 'crm_contacts', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_contact_email_relations_crm_email_types_type_id', 'crm_contact_email_relations', 'type_id', 'crm_email_types', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_contact_phone_relations_crm_contacts_contact_id', 'crm_contact_phone_relations', 'contact_id', 'crm_contacts', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_contact_phone_relations_crm_phone_types_type_id', 'crm_contact_phone_relations', 'type_id', 'crm_phone_types', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_contacts_crm_users_last_modified_user_id', 'crm_contacts', 'last_modified_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_contacts_crm_users_created_user_id', 'crm_contacts', 'created_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_dealing_status_logs_crm_users_user_id', 'crm_dealing_status_logs', 'user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_dealing_status_logs_crm_dealings_dealing_id', 'crm_dealing_status_logs', 'dealing_id', 'crm_dealings', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_dealing_status_logs_crm_dealing_statuses_status_id', 'crm_dealing_status_logs', 'status_id', 'crm_dealing_statuses', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_dealing_tag_relations_crm_dealing_tag_names_tag_id', 'crm_dealing_tag_relations', 'tag_id', 'crm_dealing_tag_names', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_dealing_tag_relations_crm_dealings_dealing_id', 'crm_dealing_tag_relations', 'dealing_id', 'crm_dealings', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_dealings_crm_users_last_modified_user_id', 'crm_dealings', 'last_modified_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_dealings_crm_contacts_contact_id', 'crm_dealings', 'contact_id', 'crm_contacts', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_dealings_crm_users_responsible_user_id', 'crm_dealings', 'responsible_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_dealings_crm_dealing_statuses_status_id', 'crm_dealings', 'status_id', 'crm_dealing_statuses', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_dealings_crm_users_created_user_id', 'crm_dealings', 'created_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_logs_crm_users_restore_user_id', 'crm_logs', 'restore_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_logs_crm_log_actions_action_id', 'crm_logs', 'action_id', 'crm_log_actions', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_logs_crm_users_user_id', 'crm_logs', 'user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_task_status_logs_crm_users_user_id', 'crm_task_status_logs', 'user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_task_status_logs_crm_tasks_task_id', 'crm_task_status_logs', 'task_id', 'crm_tasks', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_task_status_logs_crm_task_statuses_status_id', 'crm_task_status_logs', 'status_id', 'crm_task_statuses', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_tasks_crm_users_last_modified_user_id', 'crm_tasks', 'last_modified_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_tasks_crm_task_statuses_status_id', 'crm_tasks', 'status_id', 'crm_task_statuses', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_tasks_crm_task_types_type_id', 'crm_tasks', 'type_id', 'crm_task_types', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_tasks_crm_contacts_contact_id', 'crm_tasks', 'contact_id', 'crm_contacts', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_tasks_crm_dealings_dealing_id', 'crm_tasks', 'dealing_id', 'crm_dealings', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_tasks_crm_users_created_user_id', 'crm_tasks', 'created_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_users_crm_users_last_modified_user_id', 'crm_users', 'last_modified_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	    $this->addForeignKey('fk_crm_users_crm_users_created_user_id', 'crm_users', 'created_user_id', 'crm_users', 'id', 'NO ACTION', 'NO ACTION');

	}


	public function down()
	{
	    $this->dropForeignKey('fk_crm_companies_crm_users_last_modified_user_id', 'crm_companies');

	    $this->dropForeignKey('fk_crm_companies_crm_users_created_user_id', 'crm_companies');

	    $this->dropForeignKey('fk_crm_company_email_relations_crm_companies_company_id', 'crm_company_email_relations');

	    $this->dropForeignKey('fk_crm_company_email_relations_crm_email_types_type_id', 'crm_company_email_relations');

	    $this->dropForeignKey('fk_crm_company_phone_relations_crm_companies_company_id', 'crm_company_phone_relations');

	    $this->dropForeignKey('fk_crm_company_phone_relations_crm_phone_types_type_id', 'crm_company_phone_relations');

	    $this->dropForeignKey('fk_crm_contact_email_relations_crm_contacts_contact_id', 'crm_contact_email_relations');

	    $this->dropForeignKey('fk_crm_contact_email_relations_crm_email_types_type_id', 'crm_contact_email_relations');

	    $this->dropForeignKey('fk_crm_contact_phone_relations_crm_contacts_contact_id', 'crm_contact_phone_relations');

	    $this->dropForeignKey('fk_crm_contact_phone_relations_crm_phone_types_type_id', 'crm_contact_phone_relations');

	    $this->dropForeignKey('fk_crm_contacts_crm_users_last_modified_user_id', 'crm_contacts');

	    $this->dropForeignKey('fk_crm_contacts_crm_users_created_user_id', 'crm_contacts');

	    $this->dropForeignKey('fk_crm_dealing_status_logs_crm_users_user_id', 'crm_dealing_status_logs');

	    $this->dropForeignKey('fk_crm_dealing_status_logs_crm_dealings_dealing_id', 'crm_dealing_status_logs');

	    $this->dropForeignKey('fk_crm_dealing_status_logs_crm_dealing_statuses_status_id', 'crm_dealing_status_logs');

	    $this->dropForeignKey('fk_crm_dealing_tag_relations_crm_dealing_tag_names_tag_id', 'crm_dealing_tag_relations');

	    $this->dropForeignKey('fk_crm_dealing_tag_relations_crm_dealings_dealing_id', 'crm_dealing_tag_relations');

	    $this->dropForeignKey('fk_crm_dealings_crm_users_last_modified_user_id', 'crm_dealings');

	    $this->dropForeignKey('fk_crm_dealings_crm_contacts_contact_id', 'crm_dealings');

	    $this->dropForeignKey('fk_crm_dealings_crm_users_responsible_user_id', 'crm_dealings');

	    $this->dropForeignKey('fk_crm_dealings_crm_dealing_statuses_status_id', 'crm_dealings');

	    $this->dropForeignKey('fk_crm_dealings_crm_users_created_user_id', 'crm_dealings');

	    $this->dropForeignKey('fk_crm_logs_crm_users_restore_user_id', 'crm_logs');

	    $this->dropForeignKey('fk_crm_logs_crm_log_actions_action_id', 'crm_logs');

	    $this->dropForeignKey('fk_crm_logs_crm_users_user_id', 'crm_logs');

	    $this->dropForeignKey('fk_crm_task_status_logs_crm_users_user_id', 'crm_task_status_logs');

	    $this->dropForeignKey('fk_crm_task_status_logs_crm_tasks_task_id', 'crm_task_status_logs');

	    $this->dropForeignKey('fk_crm_task_status_logs_crm_task_statuses_status_id', 'crm_task_status_logs');

	    $this->dropForeignKey('fk_crm_tasks_crm_users_last_modified_user_id', 'crm_tasks');

	    $this->dropForeignKey('fk_crm_tasks_crm_task_statuses_status_id', 'crm_tasks');

	    $this->dropForeignKey('fk_crm_tasks_crm_task_types_type_id', 'crm_tasks');

	    $this->dropForeignKey('fk_crm_tasks_crm_contacts_contact_id', 'crm_tasks');

	    $this->dropForeignKey('fk_crm_tasks_crm_dealings_dealing_id', 'crm_tasks');

	    $this->dropForeignKey('fk_crm_tasks_crm_users_created_user_id', 'crm_tasks');

	    $this->dropForeignKey('fk_crm_users_crm_users_last_modified_user_id', 'crm_users');

	    $this->dropForeignKey('fk_crm_users_crm_users_created_user_id', 'crm_users');

	    $this->dropTable('crm_companies');
	    $this->dropTable('crm_company_email_relations');
	    $this->dropTable('crm_company_phone_relations');
	    $this->dropTable('crm_contact_email_relations');
	    $this->dropTable('crm_contact_phone_relations');
	    $this->dropTable('crm_contacts');
	    $this->dropTable('crm_dealing_status_logs');
	    $this->dropTable('crm_dealing_statuses');
	    $this->dropTable('crm_dealing_tag_names');
	    $this->dropTable('crm_dealing_tag_relations');
	    $this->dropTable('crm_dealings');
	    $this->dropTable('crm_email_types');
	    $this->dropTable('crm_log_actions');
	    $this->dropTable('crm_logs');
	    $this->dropTable('crm_phone_types');
	    $this->dropTable('crm_task_status_logs');
	    $this->dropTable('crm_task_statuses');
	    $this->dropTable('crm_task_types');
	    $this->dropTable('crm_tasks');
	    $this->dropTable('crm_users');
	}

}