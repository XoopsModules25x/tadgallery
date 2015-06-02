<?php

function xoops_module_update_tadgallery(&$module, $old_version)
{
    global $xoopsDB;

    if (!chk_chk9()) {
        go_update9();
    }

    go_update10();
    if (!chk_chk11()) {
        go_update11();
    }

    if (!chk_chk12()) {
        go_update12();
    }

    chk_tadgallery_block();

    return true;
}

//�s�W�Ƨ����
function chk_chk9()
{
    global $xoopsDB;
    $sql    = "select count(`photo_sort`) from " . $xoopsDB->prefix("tad_gallery");
    $result = $xoopsDB->query($sql);
    if (empty($result)) {
        return false;
    }

    return true;
}

function go_update9()
{
    global $xoopsDB;
    $sql = "ALTER TABLE " . $xoopsDB->prefix("tad_gallery") . " ADD `photo_sort` smallint(5) unsigned NOT NULL";
    $xoopsDB->queryF($sql) or redirect_header(XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin", 30, mysql_error());
}

function go_update10()
{
    global $xoopsDB;
    $sql = "update " . $xoopsDB->prefix("tad_gallery_cate") . " set show_mode='normal' where show_mode='thubm' or show_mode='slideshow' or show_mode='3d'";
    $xoopsDB->queryF($sql) or redirect_header(XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin", 30, mysql_error());
}

//�s�W�������
function chk_chk11()
{
    global $xoopsDB;
    $sql    = "select count(`content`) from " . $xoopsDB->prefix("tad_gallery_cate");
    $result = $xoopsDB->query($sql);
    if (empty($result)) {
        return false;
    }

    return true;
}

function go_update11()
{
    global $xoopsDB;
    $sql = "ALTER TABLE " . $xoopsDB->prefix("tad_gallery_cate") . " ADD `content` text NOT NULL after `title`";
    $xoopsDB->queryF($sql) or redirect_header(XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin", 30, mysql_error());
}

//�s�W�O�_�ҥ����
function chk_chk12()
{
    global $xoopsDB;
    $sql    = "select count(`enable`) from " . $xoopsDB->prefix("tad_gallery_cate");
    $result = $xoopsDB->query($sql);
    if (empty($result)) {
        return false;
    }

    return true;
}

function go_update12()
{
    global $xoopsDB;
    $sql = "ALTER TABLE " . $xoopsDB->prefix("tad_gallery_cate") . " ADD `enable` enum('1','0') NOT NULL default '1'";
    $xoopsDB->queryF($sql) or redirect_header(XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin", 30, mysql_error());
}

//�R�����~���������μ˪O��
function chk_tadgallery_block()
{
    global $xoopsDB;
    //die(var_export($xoopsConfig));
    include XOOPS_ROOT_PATH . '/modules/tadgallery/xoops_version.php';

    //����X�Ӧ����϶��H�ι����˪O
    foreach ($modversion['blocks'] as $i => $block) {
        $show_func                = $block['show_func'];
        $tpl_file_arr[$show_func] = $block['template'];
        $tpl_desc_arr[$show_func] = $block['description'];
    }

    //��X�ثe�Ҧ����˪O��
    $sql    = "SELECT bid,name,visible,show_func,template FROM `" . $xoopsDB->prefix("newblocks") . "` WHERE `dirname` = 'tadgallery' ORDER BY `func_num`";
    $result = $xoopsDB->query($sql);
    while (list($bid, $name, $visible, $show_func, $template) = $xoopsDB->fetchRow($result)) {
        //���p�{�����϶��M�˪O�藍�W�N�R��
        if ($template != $tpl_file_arr[$show_func]) {
            $sql = "delete from " . $xoopsDB->prefix("newblocks") . " where bid='{$bid}'";
            $xoopsDB->queryF($sql);

            //�s�P�˪O�H�μ˪O�����ɮפ]�n�R��
            $sql = "delete from " . $xoopsDB->prefix("tplfile") . " as a left join " . $xoopsDB->prefix("tplsource") . "  as b on a.tpl_id=b.tpl_id where a.tpl_refid='$bid' and a.tpl_module='tadgallery' and a.tpl_type='block'";
            $xoopsDB->queryF($sql);
        } else {
            $sql = "update " . $xoopsDB->prefix("tplfile") . " set tpl_file='{$template}' , tpl_desc='{$tpl_desc_arr[$show_func]}' where tpl_refid='{$bid}'";
            $xoopsDB->queryF($sql);
        }
    }

}

//�إߥؿ�
function mk_dir($dir = "")
{
    //�Y�L�ؿ��W�٨q�Xĵ�i�T��
    if (empty($dir)) {
        return;
    }

    //�Y�ؿ����s�b���ܫإߥؿ�
    if (!is_dir($dir)) {
        umask(000);
        //�Y�إߥ��Ѩq�Xĵ�i�T��
        mkdir($dir, 0777);
    }
}

//�����ؿ�
function full_copy($source = "", $target = "")
{
    if (is_dir($source)) {
        @mkdir($target);
        $d = dir($source);
        while (false !== ($entry = $d->read())) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            $Entry = $source . '/' . $entry;
            if (is_dir($Entry)) {
                full_copy($Entry, $target . '/' . $entry);
                continue;
            }
            copy($Entry, $target . '/' . $entry);
        }
        $d->close();
    } else {
        copy($source, $target);
    }
}

function rename_win($oldfile, $newfile)
{
    if (!rename($oldfile, $newfile)) {
        if (copy($oldfile, $newfile)) {
            unlink($oldfile);
            return true;
        }
        return false;
    }
    return true;
}
