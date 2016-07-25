<{includeq file="db:tadgallery_list_header.tpl"}>

<link rel="stylesheet" type="text/css" media="screen" href="<{$xoops_url}>/modules/tadgallery/module.css" />

  <!--相片-->
<{if $photo}>
  <div class="row">
    <div class="col-md-12" id="tg_container">
      <{foreach item=photo from=$photo}>
        <div class='PhotoCate' id="PhotoCate_<{$photo.sn}>">
        <{if $photo.is360}>
          <a class='Photo360' href="360.php?sn=<{$photo.sn}>&file=<{$photo.photo_l}>" id="item_photo_<{$photo.sn}>" title="<{$photo.sn}>">
          <div style="width:125px; height:100px; background: white url('<{$photo.photo_m}>') no-repeat center center; cursor: pointer; margin: 0px auto; background-size: cover;" class="show_photo">
          </div>
        <{else}>
          <a class="Photo" id="item_photo_<{$photo.sn}>" title="<{$photo.sn}>" data-photo="<{$photo.photo_l}>" href="<{$photo.photo_l}>">
          <div style="width:125px; height:100px; background: white url('<{$photo.photo_s}>') no-repeat center center; cursor: pointer; margin: 0px auto; background-size: cover;" class="show_photo">
          </div>
        <{/if}>

            <div class="pic_title2"><{$photo.title}></div>
          </a>
          <{if $photo.photo_del}>
            <button onclick="javascript:delete_tad_gallery_func(<{$photo.sn}>)" class="btn btn-xs btn-danger" style="position:absolute;bottom:2px;left:2px;display:none;"><{$smarty.const._TAD_DEL}></button>
          <{/if}>

          <{if $photo.photo_edit}>
            <button href="ajax.php?op=edit_photo&sn=<{$photo.sn}>" class="btn btn-xs btn-warning fancybox.ajax editbtn" style="position:absolute;bottom:2px;right:2px;display:none;"><{$smarty.const._TAD_EDIT}></button>
          <{/if}>
        </div>
      <{/foreach}>
    </div>
  </div>


  <script type="text/javascript" src="<{$xoops_url}>/modules/tadgallery/class/jquery.animate-shadow.js"></script>

  <script>
    $(function(){
      $('.Photo').colorbox({rel:'group', photo:true, maxWidth:'100%', maxHeight:'100%', title: function(){
          var sn = $(this).attr('title');
          return '<a href="view.php?sn=' + sn + '#photo' + sn + '" target="_blank"><{$smarty.const._MD_TADGAL_VIEW_PHOTO}></a>';
        }});

      $('.Photo360').colorbox({rel:'group', iframe:true, width:"90%", height:"90%", maxWidth:'100%', maxHeight:'100%', title: function(){
          var sn = $(this).attr('title');
          return '<a href="view.php?sn=' + sn + '#photo' + sn + '" target="_blank"><{$smarty.const._MD_TADGAL_VIEW_PHOTO}></a>';
        }});
    });

    function delete_tad_gallery_func(sn){
      var sure = window.confirm('<{$smarty.const._TAD_DEL_CONFIRM}>');
      if (!sure)  return;
      //location.href="ajax.php?op=delete_tad_gallery&sn=" + sn;
      $.post("ajax.php", { op: "delete_tad_gallery", sn: sn },
        function(data) {
        $('#PhotoCate_'+sn).remove();
      });
    }
  </script>


<{elseif $csn}>
  <div class="alert alert-danger">
    <{$smarty.const._MD_TADGAL_EMPTY}>
  </div>
<{/if}>