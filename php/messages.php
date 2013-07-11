<?php

require_once '/home/hideyuki-utsunomiya/public_html/skype_viewer/bootstrap.php';

$data = new dataManager();
$chat_list = $data->getChatList();

$messages = array();
if (isset($_GET['chatname'])) {
    $messages = $data->getMessagesByChatname($_GET['chatname']);
}

$smarty = new MySmarty();
if (isset($_GET['chatname'])) {
    $smarty->assign('active_chatname', $_GET['chatname']);
}
$smarty->assign('chat_list', $chat_list);
$smarty->assign('messages', $messages);
$smarty->display(TPL_DIR . 'messages.tpl');




class dataManager
{
    public function getMessagesByChatname($chatname, $limit = 100, $offset = 0)
    {
        $message_dao = getDao('messages');
        return $message_dao->get("select_by_chatname", array('chatname' => $chatname), $limit, $offset);
    }

    public function getChatList()
    {
        $chat_dao = getDao('chats');
        $chat_list = $chat_dao->get("select");
        foreach ($chat_list as &$chat) {
            $chat['friendlyname'] = $this->deleteAfterPipe($chat['friendlyname']);
            $chat['name'] = $this->deleteAfterSemicolon($chat['name']);
        }
        return $chat_list;
    }

    private function deleteAfterPipe($str)
    {
        return preg_replace("/\|.*$/", "", $str);
    }

    private function deleteAfterSemicolon($str)
    {
        return preg_replace("/;.*$/", "", $str);
    }

    private function getUniqListByKey($list, $key)
    {
        return $list;
    }
}
