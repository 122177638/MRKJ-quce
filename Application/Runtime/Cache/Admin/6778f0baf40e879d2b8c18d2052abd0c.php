<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv=content-type content="text/html; charset=utf-8" />
    <link href="/book/Public/admin/css/admin.css" type="text/css" rel="stylesheet" />
    <script language=javascript>
        function expand(el)
        {
            childobj = document.getElementById("child" + el);

            if (childobj.style.display == 'none')
            {
                childobj.style.display = 'block';
            }
            else
            {
                childobj.style.display = 'none';
            }
            return;
        }
    </script>
</head>
<body>
<table height="100%" cellspacing=0 cellpadding=0 width=170
       background=/book/Public/admin/img/menu_bg.jpg border=0>
    <tr>
        <td valign=top align=middle>
            <table cellspacing=0 cellpadding=0 width="100%" border=0>
                <tr>
                    <td height=10></td>
                </tr>
            </table>
            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/book/Public/admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(3)
                            href="javascript:void(0);">权限管理</a>
                    </td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id=child3 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('admin/admin/adminselect','',false);?>"
                           target=main>管理员列表</a>
                    </td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="#"
                           target=main>管理员日记</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('admin/admin/select','',false);?>"
                           target=main>角色管理</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('admin/admin/nodeselect','',false);?>"
                           target=main>节点管理</a></td>
                </tr>

                <tr height=4>
                    <td colspan=2></td></tr>
            </table>

            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/book/Public/admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(4)
                            href="javascript:void(0);">书本管理</a>
                    </td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id=child4 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>

                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9>
                    </td>
                    <td><a class=menuchild
                           href="<?php echo U('Admin/Index/bookselect',0,false);?>"
                           target=main>书本列表</a>
                    </td>
                </tr>

                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9>
                    </td>
                    <td><a class=menuchild
                           href="<?php echo U('Admin/Index/bookadd',0,false);?>"
                           target=main>书本添加</a>
                    </td>
                </tr>

                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9>
                    </td>
                    <td><a class=menuchild
                           href="?c=catogery&a=add"
                           target="main">书本分类</a>
                    </td>
                </tr>

                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9>
                    </td>
                    <td><a class=menuchild
                           href="#"
                           target=main>用户评价</a>
                    </td>
                </tr>

                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9>
                    </td>
                    <td><a class=menuchild
                           href="?c=type&a=typeselect"
                           target=main>书本类型</a>
                    </td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9>
                    </td>
                    <td><a class=menuchild
                           href="#"
                           target=main>书本回收站</a>
                    </td>
                </tr>

                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9>
                    </td>
                    <td><a class=menuchild
                           href="#"
                           target=main>书本上下架</a>
                    </td>
                </tr>


                <tr height=4>
                    <td colspan=2></td>
                </tr>
            </table>

            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/book/Public/admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(5)
                            href="javascript:void(0);">会员管理</a></td></tr>
                <tr height=4>
                    <td></td></tr></table>
            <table id=child5 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>

                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="?c=user&a=select"
                           target=main>会员列表</a></td></tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="?c=user&a=add"
                           target=main>添加会员</a></td></tr>
                <tr height=4>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/book/Public/admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="?c=user&a=member"
                           target=main>会员等级</a></td></tr>
                <tr height=4>
                    <td colspan=2></td></tr></table>
           


           
            <table cellspacing=0 cellpadding=0 width="100%" border=0>
                <tr>
                    <td height=10></td>
                </tr>
            </table>
                </td>
        <td width=1 bgcolor=#d1e6f7></td>
    </tr>
</table>
</body>
</html>