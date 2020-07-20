<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>:: 다음 주소록 API ::</title>

	<script type="text/JavaScript" src="http://code.jquery.com/jquery-1.7.min.js"></script>

	<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>

	<script type="text/javascript">

		function openDaumZipAddress() {

			new daum.Postcode({

				oncomplete:function(data) {

					jQuery("#postcode1").val(data.postcode1);

					jQuery("#postcode2").val(data.postcode2);


					jQuery("#zonecode").val(data.zonecode);

					jQuery("#address").val(data.address);

					jQuery("#address_etc").focus();

					console.log(data);

				}

			}).open();

		}

	</script>

</head>

<body>

	<input id="postcode1" type="text" value="" style="width:50px;" readonly/>

	&nbsp;-&nbsp;

	<input id="postcode2" type="text" value="" style="width:50px;" readonly/> 구 우편번호

    &nbsp;&nbsp;

	<input id="zonecode" type="text" value="" style="width:50px;" readonly/> 새 우편번호

	&nbsp;

	<input type="button" onClick="openDaumZipAddress();" value = "주소 찾기" />

	<br/>

	<input type="text" id="address" value="" style="width:240px;" readonly/>

	<input type="text" id="address_etc" value="" style="width:200px;"/> 상세주소를 입력해주세요.

</body>
</html>