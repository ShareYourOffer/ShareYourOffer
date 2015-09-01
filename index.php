<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Share Your Offer</title>
        <link rel="stylesheet" href="Styles/HomeStyle.css" type="text/css" />
        <script src="jquery-1.10.2.js"></script>
        <script>
            $(function () {
                var $location = $('#location');
                $.ajax({
                    url: 'http://ipinfo.io/json',
                    dataType: 'json',
                    success: function (data) {
                        $location.append('<img src="imgLocation.png" style="height:4mm;width:5mm">' + data['city'])
                    }
                });
            }
            );

            function WebsiteChange() {
                //alert($("#ddlWebsite option:selected").attr("class"));
                if ($("#ddlWebsite option:selected").attr("class") != 'nc') {
                    $('.imgOfferIcon').hide();
                    $('.' + $("#ddlWebsite option:selected").attr("class") + '').show();
                }
                else {
                    $('.imgOfferIcon').show();
                }
            }
        </script>
    </head>
    <body>
        <table id="tblSearch">
            <tr>
                <td colspan="5">
                    <img src="Images/syoIcon.png" id="imgLogo" />
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <select id="ddlWebsite" onchange="WebsiteChange()">
                        <option class="nc">--Select--</option>
                        <option class="fl">FlipKart</option>
                        <option class="jb">Jabong</option>
                        <option class="my">Myntra</option>
                        <option class="am">Amazon</option>
                        <option class="sn">SnapDeal</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <input type="text" id="txtSearch" />
                    <input type="button" id="btnSearch" value="Search" />
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <div id="location"></div>
                </td>
            </tr>   
            <tr>
                <td>
                    <img src="Images/Amazon.png" class="imgOfferIcon am" />
                </td>
                <td>
                    <img src="Images/FlipKart.png" class="imgOfferIcon fl" />
                </td>
                <td>
                    <img src="Images/Jabong.png" class="imgOfferIcon jb" />
                </td>
                <td>
                    <img src="Images/SnapDeal.png" class="imgOfferIcon sn" />
                </td>
                <td>
                    <img src="Images/Myntra.png" class="imgOfferIcon my" />
                </td>
            </tr>
            <tr>
                <td>
                    <img src="Images/Myntra.png" class="imgOfferIcon my" />
                </td>
                <td>
                    <img src="Images/Jabong.png" class="imgOfferIcon jb" />
                </td>
                <td>
                    <img src="Images/SnapDeal.png" class="imgOfferIcon sn" />
                </td>
                <td>
                    <img src="Images/FlipKart.png" class="imgOfferIcon fl" />
                </td>
                <td>
                    <img src="Images/Amazon.png" class="imgOfferIcon am" />
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <img src="Images/underConstruction.png" id="imgLogo" />
                </td>
            </tr>
        </table>
        <div id="suggestionBox">
            <div>
                <h3>Suggestions</h3>
            </div>
            <div style="margin-left: 10px">
                <img src="Images/Myntra.png" width="40px" height="40px"/><span style="float: top">My Item Link</span>
                <br/><a href="#">Link</a>
            </div>
            <hr>
            <div style="margin-left: 10px">
                <img src="Images/Jabong.png" width="40px" height="40px"/><span style="float: top">My Item Link</span>
                <br/><a href="#">Link</a>
            </div>
            <hr>
            <div style="margin-left: 10px">
                <img src="Images/Amazon.png" width="40px" height="40px"/><span style="float: top">My Item Link</span>
                <br/><a href="#">Link</a>
            </div>
            <hr>
            <div style="margin-left: 10px">
                <img src="Images/Myntra.png" width="40px" height="40px"/><span style="float: top">My Item Link</span>
                <br/><a href="#">Link</a>
            </div>
            <hr>
            <div style="margin-left: 10px">
                <img src="Images/Myntra.png" width="40px" height="40px"/><span style="float: top">My Item Link</span>
                <br/><a href="#">Link</a>
            </div>
            <hr>
            <div style="margin-left: 10px">
                <img src="Images/Myntra.png" width="40px" height="40px"/><span style="float: top">My Item Link</span>
                <br/><a href="#">Link</a>
            </div>
            <hr>
            <div style="margin-left: 10px">
                <img src="Images/Myntra.png" width="40px" height="40px"/><span style="float: top">My Item Link</span>
                <br/><a href="#">Link</a>
            </div>
            <hr>
        </div>
    </body>
</html>
