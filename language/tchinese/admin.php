<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2008-03-23
// $Id: admin.php,v 1.3 2008/05/05 03:22:37 tad Exp $
// ------------------------------------------------------------------------- //

include_once "../../tadtools/language/{$xoopsConfig['language']}/admin_common.php";

define("_BACK_MODULES_PAGE","�^�Ҳխ���");

define("_BP_DEL_CHK","�T�w�n�R������ơH");
define("_BP_FUNCTION","�\��");
define("_BP_EDIT","�s��");
define("_BP_DEL","�R��");
define("_BP_ADD","�s�W���");

define("_MA_INPUT_CATE_FORM","�ۤ������޲z");
define("_MA_SAVE","�x�s");
define("_TAD_NEED_TADTOOLS"," �ݭn modules/tadtools�A�i��<a href='http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50' target='_blank'>Tad�Ч���</a>�U���C");

//cate.php
define("_MA_TADGAL_SN","�Ǹ�");
define("_MA_TADGAL_CSN","�ۤ�����");
define("_MA_TADGAL_CTITLE","�������D");
define("_MA_TADGAL_DESCRIPTION","�ۤ�����");
define("_MA_TADGAL_FILENAME","�ɦW");
define("_MA_TADGAL_SIZE","�j�p");
define("_MA_TADGAL_TYPE","����");
define("_MA_TADGAL_UID","�o�G��");
define("_MA_TADGAL_POST_DATE","�o��ɶ�");
define("_MA_TADGAL_COUNTER","�H���");
define("_MA_TADGAL_PASSWD","��ï�K�X");
define("_MA_TADGAL_PASSWD_DESC","�]�i���]�^");
define("_MA_TADGAL_CATE_ADVANCE_SETUP","��ܶi���]�w");
define("_MA_TADGAL_CATE_HIDE_ADVANCE_SETUP","���öi���]�w");
define("_MA_TADGAL_CATE_SHL_SETUP","��ܨ��s�s�]�w");
define("_MA_TADGAL_CATE_HIDE_SHL_SETUP","���è��s�s�]�w");
define("_MA_TADGAL_CATE_POWER_SETUP","�v���]�w");
define("_MA_TADGAL_CATE_SHOW_MODE","��ܼҦ�");
define("_MA_TADGAL_CATE_SHOW_MODE_1","�@�몺�Y�ϼҦ��]�w�]�^");
define("_MA_TADGAL_CATE_SHOW_MODE_2","3D���Y�Ҧ�");
define("_MA_TADGAL_CATE_SHOW_MODE_3","��v���q�Ҧ�");
define("_MA_TADGAL_COVER","�ʭ���");
define("_MD_TADGAL_COVER","��ܫʭ���");

define("_MA_TADGAL_TITLE","���D");
define("_MA_TADGAL_CREATOR","�@��");
define("_MA_TADGAL_LOCATION","�v���ɮ�");
define("_MA_TADGAL_IMAGE","�Y�Ϧ�m");
define("_MA_TADGAL_INFO","�U����m");
define("_MA_TADGAL_LSN","�y����");
define("_MA_TADGAL_OF_LSN","���ݶ���");
define("_MA_TADGAL_ENABLE_GROUP","�i�u<font color=#66CCFF>�[��</font>�v�s��");
define("_MA_TADGAL_ENABLE_UPLOAD_GROUP","�i�u<font color=fuchsia>�W��</font>�v�s��");
define("_MA_TADGAL_SORT","�Ƨ�");
define("_MA_TADGAL_ALL_OK","�Ҧ��s��");
define("_MA_TADGAL_LIST_CATE","�����@����");
define("_MA_TADGAL_CANT_OPEN","�L�k�إ� %s");
define("_MA_TADGAL_CANT_WRITE","�L�k�g�J %s");
define("_MA_TADGAL_SHOW_DATE","�]%s �o�G�^");
define("_MA_TADGAL_CATE_SELECT","������");
define("_MA_TADGAL_XML_OK","�u%s�v������M��s�@�����I");
define("_MA_TADGAL_NO_DIRNAME","�L�ؿ��W��");
define("_MA_TADGAL_MKDIR_ERROR","�L�k�إ� %s �ؿ��A�Ф�ʫإߡA�ö}�ҰΦW�g�J�v���]777�^");
define("_MA_TADGAL_LIST_ALL","�C�X�Ҧ��ۤ�");

define("_MA_MKDIR_NO_DIRNAME","�S�����w��Ƨ��W��");
define("_MA_MKDIR_ERROR","%s ��Ƨ��إߥ��ѡI");

define("_MA_TADGAL_SHOW_MODE","�Y�ϥ~��");
define("_MA_TADGAL_SHOW_MODE_1","�L�~��");
define("_MA_TADGAL_SHOW_MODE_2","�������v�~��");
define("_MA_TADGAL_SHOW_MODE_3","�ꨤ�~��");
define("_MA_TADGAL_SHOW_MODE_4","���v�ۮ�");
define("_MA_TADGAL_SHOW_MODE_5","��t���H");
define("_MA_TADGAL_SHOW_MODE_6","�ۿO���~��");

//update
define("_MA_TADGAL_AUTOUPDATE","�Ҳդɯ�");
define("_MA_TADGAL_AUTOUPDATE_VER","����");
define("_MA_TADGAL_AUTOUPDATE_DESC","�@��");
define("_MA_TADGAL_AUTOUPDATE_STATUS","��s���p");
define("_MA_TADGAL_AUTOUPDATE_GO","�ߧY��s");
define("_MA_GAL_AUTOUPDATE1","�b���O��ƪ��[�J��ܼҦ����");
define("_MA_GAL_AUTOUPDATE2","���Y�ϲ���s�����|");
define("_MA_GAL_AUTOUPDATE3","�[�J��ï�]�����^�w�]�e�{�Ҧ��]�w��� show_mode");
define("_MA_GAL_AUTOUPDATE4","�[�J��ï�]�����^�ʭ��Ϫ���� cover");
define("_MA_GAL_AUTOUPDATE5","�[�J�j�Ĩ��s�s�B�U�����]�w��� no_hotlink");
define("_MA_GAL_AUTOUPDATE6","�[�����}�]�̪�������� uid");


define("_MA_TADGAL_SELECT_ALL","����");
define("_MA_TADGAL_LIST_GOOD","���Ϥ��޲z�Ҧ�");
define("_MA_TADGAL_LIST_NORMAL","���`�Ϥ��޲z�Ҧ�");
define("_MA_TADGAL_CLICK_EDIT_TITLE","�m�I��s����D�n");
define("_MA_TADGAL_CLICK_EDIT_DESC","�[�J����");
define("_MA_TADGAL_THE_ACT_IS","�N�Ŀ諸�Ϥ��G");
define("_MA_TADGAL_ADD_GOOD","�[�J���");
define("_MA_TADGAL_DEL_GOOD","�������");
define("_MA_TADGAL_MOVE_TO","�h����");
define("_MA_TADGAL_GO","����");
define("_MA_TADGAL_TAG","�s�W����");
define("_MA_TADGAL_REMOVE_TAG","�M�ż���");
define("_MA_TADGAL_TAG_TXT","�]�Y���h�ӡA�Хγr�I�u,�v�j�}�^");
define("_MA_TADGAL_LINK_TO_CATE","�[�ݡu%s�v��ï");
define("_MA_TADGAL_ADD_TITLE","�s�W���D");
define("_MA_TADGAL_ADD_DESCRIPTION","�[�J����");
define("_MA_TADGAL_RE_CREATE_THUMBNAILS","�����Y��");
define("_MA_TADGAL_RE_CREATE_THUMBNAILS_ALL","����");
define("_MA_TADGAL_RE_CREATE_THUMBNAILS_M","����");
define("_MA_TADGAL_RE_CREATE_THUMBNAILS_S","�p��");
define("_MA_TADGAL_RE_CREATE_THUMBNAILS_FB","facebook�ι�");
?>
