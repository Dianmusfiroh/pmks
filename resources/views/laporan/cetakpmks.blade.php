<style>
    table{
        width: 100%;
    }
 body{
     font-size:11pt;
 }
 .header{
     text-align: center;
 }
 .page_break { page-break-before: always; }
</style>

<div class="header row">
    <table>
        <tr>
            <th>
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path("/img/KOTA_GORONTALO.png"))) }} " style="width: 100px; height: 100px;">

            </th>
            <th>
              <h3><strong>Laporan Hasil Penyandang Masalah Kesejahteraan Sosial</strong></h3>
                <h3><strong>Dinas Sosial Dan Pemberdayaan Manusia</strong></h3>
                <h3><strong>Kota Gorntalo</strong></h3>
                  <br>
              

            </th>
            <th>
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path("/img/dinsos.png"))) }} " style="width: 100px; height: 100px;">

            </th>
        </tr>
    </table>
    <strong>
  <hr><width="100" height="100"></hr>
</strong>
</div>

{{--  <!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Report Sample</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">
  <style type="text/css">
    :root {
        --tableHeaderBackgroundColor: #f1f7fc;
        --tableHeaderTextColor: #3e5275;
        --tableBorderColor: #e6f1ff;
        --text-color: #5b6b89;
        --font-size: 16px;
        --section-horizontal-padding: 24px;
        --section-vertical-padding: 16px;
        --positive-color: #4eab41;
        --negative-color: #f5696a;
        --accent-color: #499aff;
        --align: left;
        --direction: ltr;
      }
      
      @font-face {
        font-family: "Avenir Heavy";
        src: url("https://filebin.net/uv5g4vlsdtqpzeqd/Avenir_Heavy.ttf");
        font-family: "SF Pro Display Semi bold";
        src: url("https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap");
      }
      
      * {
        direction: var(--direction);
      }
      .numericField {
        font-family: "Lato";
        font-weight: Bold;
      }
      .rowSubLabel {
        display: block;
        color: red;
      }
      /**
      TABLE STYLE
      **/
      table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid var(--tableBorderColor);
      }
      table th {
        background-color: var(--tableHeaderBackgroundColor);
        font-weight: bold;
        text-align: var(--align);
        color: var(--tableHeaderTextColor);
      }
      table td {
        text-align: var(--align);
      }
      table,
      th,
      td {
        border-right: 1px solid var(--tableBorderColor);
        padding: 12px;
      }
      /*Generic*/
      html,
      body {
        padding: 0;
        margin: 0;
        color: var(--text-color);
        font-size: var(--font-size);
      }
      h1,
      h2,
      h3 {
        padding: 0;
        margin: 0;
      }
      .centerColumnContent {
        text-align: center;
      }
      .positiveValue {
        color: var(--positive-color);
      }
      .negativeValue {
        color: var(--negative-color);
      }
      /*Header*/
      .pageHeader {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: var(--section-vertical-padding) var(--section-horizontal-padding);
        border-bottom: 1px solid var(--tableBorderColor);
      }
      .brandLogo img {
        width: 100px;
      }
      
      .storeInfo {
        display: flex;
        flex-direction: column;
        font-weight: bold;
      }
      .storeInfo .storeName {
        color: var(--accent-color);
      }
      .storeInfo .storeLabel {
        font-size: 0.8em;
      }
      /**
      SubHeader
      **/
      .subHeader {
        display: flex;
        flex-direction: column;
        text-align: center;
        margin: 16px 0;
      }
      .subHeader .title {
        color: var(--accent-color);
      }
      /**
      SubHeader details
      */
      .subHeaderDetails {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        border: 1px solid var(--tableBorderColor);
        border-radius: 6px;
        padding: 12px;
        margin: 12px;
        width: 86%;
        margin: 16px auto;
      }
      .subHeaderDetail span {
        display: block;
        font-weight: bold;
      }
      .subHeaderDetail {
        padding: 0 12px;
      }
      
      :dir(ltr) {
        background-color: ;
      }
      
      html[dir="rtl"] .subHeaderDetail:not(:last-child) {
        border-right: solid 1px var(--tableBorderColor);
      }
      
      html[dir="ltr"] .subHeaderDetail:not(:first-child) {
        border-left: solid 1px var(--tableBorderColor);
      }
      
      .subHeaderDetailValue {
        color: var(--accent-color);
      }
      
      /**
      Footer
      **/
      .pageFooter {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
        font-size: 14px;
        height: 4vh;
        padding: var(--section-vertical-padding) var(--section-horizontal-padding);
      }
      .pageFooter img.installBanner {
        width: 140px;
      }
      .pageFooter .contact {
        display: flex;
        flex-direction: column;
      }
      
  </style>
</head>

<body>
  <header class="pageHeader">
    <span class="brandLogo">
      <img src="{{ asset('img/5439.jpg') }}" />
    </span>
    <div class="storeInfo">
      <span class="storeName">Mehdi Store</span>
      <span class="storeLabel">+123235436346</span>
    </div>
  </header>




  <table>
    <tr>
      <th>#</th>
      <th>Date</th>
      <th>Type</th>
      <th>Quantity</th>
      <th>Unit Cost</th>
      <th>Total Cost</th>
    </tr>
    <tr>
      <td class="indexColumn">1</td>
      <td>25/08/2021 - 12:38 </td>
      <td>Sale<span class="rowSubLabel"></span>Hello</td>
      <td class="negativeValue numericField">-5kg</td>
      <td class="negativeValue">10 dh</td>
      <td class="negativeValue">50 dh</td>
    </tr>
    <tr>
      <td>1</td>
      <td>25/08/2021 - 12:38 </td>
      <td>Sale</td>
      <td class="positiveValue numericField">5kg</td>
      <td class="positiveValue numericField">50 dh</td>
      <td class="positiveValue numericField">870 dh</td>
    </tr>
  </table>

  <footer class="pageFooter">
    <div class="contact">
   
    </div>
  </footer>

</body>

</html>  --}}
<br>
<br>
<br>

<table border="1" class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama Lengkap</th>
            <th>Jenis PMKS</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $item )
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jenisPMKS}}</td>
            <td>{{$item->nama_kecamatan}}</td>
            <td>{{$item->kelurahan}}</td>
        
        </tr>
        @endforeach

    </tbody>
</table>

