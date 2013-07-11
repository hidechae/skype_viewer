<?php

class MessagesDao extends BaseDao
{
    protected $db = 'main.db';
    protected $table = 'Messages';
    protected $field_name = array(
        'id',
        'is_permanent',
        'convo_id',
        'chatname',
        'author',
        'from_dispname',
        'author_was_live',
        'guid',
        'dialog_partner',
        'timestamp',
        'type',
        'sending_status',
        'consumption_status',
        'edited_by',
        'edited_timestamp',
        'param_key',
        'param_value',
        'body_xml',
        'identities',
        'reason',
        'leavereason',
        'participant_count',
        'error_code',
        'chatmsg_type',
        'chatmsg_status',
        'body_is_rawxml',
        'oldoptions',
        'newoptions',
        'newrole',
        'pk_id',
        'crc',
        'remote_id',
        'call_guid',
        'extprop_chatmsg_ft_index_timestamp',
        'extprop_chatmsg_is_pending',
    );

    protected $queries = array(
        "select" => array(
            "sql" => "select * from __TABLE_NAME__ order by timestamp desc",
        ),
        "select_by_chatname" => array(
            "sql" => "
                select * from __TABLE_NAME__
                where
                    chatname like \":chatname%\"
                order by timestamp desc",
        ),
        "select_by_chatname_fuzzy" => array(
            "sql" => "
                select * from __TABLE_NAME__
                where
                    chatname like \":chatname%\" or chatname like \":chatname%\"
                order by timestamp desc",
        ),
    );
}

/* table schema

CREATE TABLE "Messages"
(
    id INTEGER NOT NULL PRIMARY KEY,
    is_permanent INTEGER,
    convo_id INTEGER,
    chatname TEXT,
    author TEXT,
    from_dispname TEXT,
    author_was_live INTEGER,
    guid BLOB,
    dialog_partner TEXT,
    timestamp INTEGER,
    type INTEGER,
    sending_status INTEGER,
    consumption_status INTEGER,
    edited_by TEXT,
    edited_timestamp INTEGER,
    param_key INTEGER,
    param_value INTEGER,
    body_xml TEXT,
    identities TEXT,
    reason TEXT,
    leavereason INTEGER,
    participant_count INTEGER,
    error_code INTEGER,
    chatmsg_type INTEGER,
    chatmsg_status INTEGER,
    body_is_rawxml INTEGER,
    oldoptions INTEGER,
    newoptions INTEGER,
    newrole INTEGER,
    pk_id INTEGER,
    crc INTEGER,
    remote_id INTEGER,
    call_guid TEXT,
    extprop_chatmsg_ft_index_timestamp INTEGER,
    extprop_chatmsg_is_pending INTEGER
);

CREATE INDEX IX_Messages_call_guid ON Messages
(
    call_guid
);

CREATE INDEX IX_Messages_convo_id_timestamp_consumption_status_sending_status ON Messages
(
    convo_id,
    timestamp,
    consumption_status,
    sending_status
);

CREATE INDEX IX_Messages_remote_id ON Messages
(
    remote_id
);

CREATE INDEX IX_Messages_timestamp_chatname ON Messages
(
    timestamp,
    chatname
);

CREATE INDEX IX_Messages_timestamp_convo_id_type ON Messages
(
    timestamp,
    convo_id,
    type
);
*/
