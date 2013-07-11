<?php

class ChatsDao extends BaseDao
{
    protected $db = 'main.db';
    protected $table = 'Chats';
    protected $field_name = array(
        'id',
        'is_permanent',
        'name',
        'options',
        'friendlyname',
        'description',
        'timestamp',
        'activity_timestamp',
        'dialog_partner',
        'adder',
        'type',
        'mystatus',
        'myrole',
        'posters',
        'participants',
        'applicants',
        'banned_users',
        'name_text',
        'topic',
        'topic_xml',
        'guidelines',
        'picture',
        'alertstring',
        'is_bookmarked',
        'passwordhint',
        'unconsumed_suppressed_msg',
        'unconsumed_normal_msg',
        'unconsumed_elevated_msg',
        'unconsumed_msg_voice',
        'activemembers',
        'state_data',
        'lifesigns',
        'last_change',
        'first_unread_message',
        'pk_type',
        'dbpath',
        'split_friendlyname',
        'conv_dbid',
    );

    protected $queries = array(
        "select" => array(
            "sql" => "select * from __TABLE_NAME__ order by timestamp desc",
        ),
    );
}

/* table schema

CREATE TABLE "Chats" (
    id INTEGER NOT NULL PRIMARY KEY,
    is_permanent INTEGER,
    name TEXT,
    options INTEGER,
    friendlyname TEXT,
    description TEXT,
    timestamp INTEGER,
    activity_timestamp INTEGER,
    dialog_partner TEXT,
    adder TEXT,
    type INTEGER,
    mystatus INTEGER,
    myrole INTEGER,
    posters TEXT,
    participants TEXT,
    applicants TEXT,
    banned_users TEXT,
    name_text TEXT,
    topic TEXT,
    topic_xml TEXT,
    guidelines TEXT,
    picture BLOB,
    alertstring TEXT,
    is_bookmarked INTEGER,
    passwordhint TEXT,
    unconsumed_suppressed_msg INTEGER,
    unconsumed_normal_msg INTEGER,
    unconsumed_elevated_msg INTEGER,
    unconsumed_msg_voice INTEGER,
    activemembers TEXT,
    state_data BLOB,
    lifesigns INTEGER,
    last_change INTEGER,
    first_unread_message INTEGER,
    pk_type INTEGER,
    dbpath TEXT,
    split_friendlyname TEXT,
    conv_dbid INTEGER
);
CREATE INDEX IX_Chats_activity_timestamp ON Chats (activity_timestamp);
CREATE INDEX IX_Chats_first_unread_message ON Chats (first_unread_message);
CREATE INDEX IX_Chats_is_bookmarked ON Chats (is_bookmarked);
CREATE INDEX IX_Chats_lifesigns ON Chats (lifesigns);
CREATE INDEX IX_Chats_mystatus ON Chats (mystatus);
CREATE INDEX IX_Chats_name ON Chats (name);
CREATE INDEX IX_Chats_participants ON Chats (participants);
CREATE INDEX IX_Chats_type ON Chats (type);
*/
