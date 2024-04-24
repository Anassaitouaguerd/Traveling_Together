<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
       body{
        margin: 0;
        padding: 0;
        background: #fff;
      }
      
      .pdf{
        position: absolute;
        top: 80%;
        left: 44%;
      }
      
      .generate {
      border: none;
      padding: 15px;
      border-radius: 8px;
      background: bisque;
      box-shadow: 0px 2px 50px 2px rgba(0, 0, 0, 0.3);
      cursor: pointer;
      }

      #parent{
        position: absolute;
        top: 27%;
        left: 27%;

      }
      #box{
        position: relative;
        width: 100%
      }
      
      .ticket{
        width: 600px;
        height: 250px;
        background: #FFB300;
        border-radius: 3px;
        box-shadow: 0 0 100px #aaa;
        border-top: 1px solid #E89F3D;
        border-bottom: 1px solid #E89F3D;
      }
  
      .left{
        margin: 0;
        padding: 0;
        list-style: none;
        position: absolute;
        top: 0px;
        left: -5px;
      }
  
      .left li{
        width: 0px;
        height: 0px;
      }
  
      .left li:nth-child(-n+2){
        margin-top: 8px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-right: 5px solid #FFB300;
      }
   
       .left li:nth-child(3),
      .left li:nth-child(6){
        margin-top: 8px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-right: 5px solid #EEEEEE;
      }
  
      .left li:nth-child(4){
        margin-top: 8px;
        margin-left: 2px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-right: 5px solid #EEEEEE;
      }
  
      .left li:nth-child(5){
        margin-top: 8px;
        margin-left: -1px;
        border-top: 6px solid transparent;
        border-bottom: 6px solid transparent; 
        border-right: 6px solid #EEEEEE;
      }
  
      .left li:nth-child(7),
      .left li:nth-child(9),
      .left li:nth-child(11),
      .left li:nth-child(12){
        margin-top: 7px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-right: 5px solid #E5E5E5;
      }
  
      .left li:nth-child(8){
        margin-top: 7px;
        margin-left: 2px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-right: 5px solid #E5E5E5;
      }
  
      .left li:nth-child(10){
        margin-top: 7px;
        margin-left: 1px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-right: 5px solid #E5E5E5;
      }
  
      .left li:nth-child(13){
        margin-top: 7px;
        margin-left: 2px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-right: 5px solid #FFB300;
      }
  
      .left li:nth-child(14){
        margin-top: 7px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-right: 5px solid #FFB300;
      }
  
      .right{
        margin: 0;
        padding: 0;
        list-style: none;
        position: absolute;
        top: 0px;
        right: -5px;
      }
  
      .right li:nth-child(-n+2){
        margin-top: 8px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-left: 5px solid #FFB300;
      }
  
      .right li:nth-child(3),
      .right li:nth-child(4),
      .right li:nth-child(6){
        margin-top: 8px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-left: 5px solid #EEEEEE;
      }
  
      .right li:nth-child(5){
        margin-top: 8px;
        margin-left: -2px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-left: 5px solid #EEEEEE;
      }
  
      .right li:nth-child(8),
      .right li:nth-child(9),
      .right li:nth-child(11){
        margin-top: 7px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-left: 5px solid #E5E5E5;
      }
  
      .right li:nth-child(7){
        margin-top: 7px;
        margin-left: -3px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-left: 5px solid #E5E5E5;
      }
  
      .right li:nth-child(10){
        margin-top: 7px;
        margin-left: -2px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-left: 5px solid #E5E5E5;
      }
  
      .right li:nth-child(12){
        margin-top: 7px;
        border-top: 6px solid transparent;
        border-bottom: 6px solid transparent; 
        border-left: 6px solid #E5E5E5;
      }
  
      .right li:nth-child(13),
      .right li:nth-child(14){
        margin-top: 7px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent; 
        border-left: 5px solid #FFB300;
      }
      .content{
        position: absolute;
        top: 40px;
        width: 600px;
        height: 170px;
        background: #eee;
      }
  
      .airline{
        position: absolute;
        top: 10px;
        left: 10px;
        font-family: Arial;
        font-size: 20px;
        font-weight: bold;
        color: rgba(0,0,102,1);
      }
  
      .boarding{
        position: absolute;
        top: 10px;
        left: 258px;
        font-family: Arial;
        font-size: 18px;
        color: rgba(255,255,255,0.6);
      }
  
      .jfk{
        font-family: Arial;
        font-size: 16px;
        color: #222;
      }
  
      .sfo{
        font-family: Arial;
        font-size: 16px;
        color: #222;
      }
  
      .plane{
        position: absolute;
        left: 105px;
        top: 0px;
      }
  
      .sub-content{
        background: #e5e5e5;
        width: 100%;
        height: 100px;
        position: absolute;
        top: 70px;
      }
  
      .watermark{
        position: absolute;
        left: 5px;
        top: -10px;
        font-family: Arial;
        font-size: 110px;
        font-weight: bold;
        color: rgba(255,255,255,0.2);
      }
  
      .name{
        position: absolute;
        top: 10px;
        left: 10px;
        font-family: Arial Narrow, Arial;
        font-weight: bold;
        font-size: 14px;
        color: #999;
      }
  
      .name span{
        color: #555;
        font-size: 17px;
      }
  
      .flight{
        position: absolute;
        top: 10px;
        left: 180px;
        font-family: Arial Narrow, Arial;
        font-weight: bold;
        font-size: 14px;
        color: #999;
      }
  
      .flight span{
        color: #555;
        font-size: 17px;
      }
  
      .gate{
        position: absolute;
        top: 10px;
        left: 280px;
        font-family: Arial Narrow, Arial;
        font-weight: bold;
        font-size: 14px;
        color: #999;
      }
  
      .gate span{
        color: #555;
        font-size: 17px;
      }
      .seat{
        position: absolute;
        top: 10px;
        left: 350px;
        font-family: Arial Narrow, Arial;
        font-weight: bold;
        font-size: 14px;
        color: #999;
      }
  
      .seat span{
        color: #555;
        font-size: 17px;
      }
  
      .boardingtime{
        position: absolute;
        top: 60px;
        left: 10px;
        font-family: Arial Narrow, Arial;
        font-weight: bold;
        font-size: 14px;
        color: #999;
      }
  
      .boardingtime span{
        color: #555;
        font-size: 17px;
      } 
  
      #barcode{
        position: absolute;
        left: 456px;
        bottom: 6px;
        background: #222;
        
      }
  
      .slip{
        left: 455px;
      }
  
      .nameslip{
        top: 60px;
        left: 410px;
      }
  
      .flightslip{
        left: 410px;
      }
  
      .seatslip{
        left: 540px;
      }
  
      .jfkslip{
        font-size: 11px;
        top: 30px;
        left: 410px;
      }
  
      .sfoslip{
        font-size: 11px;
        top: 30px;
        left: 533px;
      }
  
      .planeslip{
        top: 10px;
        left: 475px;
      }
  
      .airlineslip{
        left: 455px;
      }
      .container-gares-jfk{
        position: relative;
        top: 17px;
        left: 6px;
        width: 100px;
      }
      .container-gares-sfo{
        position: relative;
        left: 175px;
        width: 100px;
      }
      .container-gares-jfkslip{
        position: relative;
        left: 405px;
      top: -11px;
      }
      .container-gares-sfoslip{
        position: relative;
      left: 534px;
      top: -29px;
      }
  </style>

</head>

<body>
  <div id="parent">

    <div id="box">
        <div class="ticket">
          <span class="airline">Travling Together</span>
          <span class="airline airlineslip">Travling</span>
          <span class="boarding">Boarding pass</span>
          <div class="content">
            <div class="container-gares-jfk">
              <span class="jfk">{{$reservation->voyage->rolation_gare_depart->name}}</span>
            </div>
            <span class="plane">
                <?xml version="1.0" encoding="utf-8"?>
                    <svg clip-rule="evenodd" fill-rule="evenodd" height="60" width="60" image-rendering="optimizeQuality" id="Icons" xmlns:xlink="http://www.w3.org/1999/xlink" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" xml:space="preserve" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path d="M2,21h26.7c1.1,0,2.1-0.5,2.7-1.4c0.6-0.9,0.8-1.9,0.4-2.9c-1.4-4-5.2-6.7-9.6-6.7H2c-0.6,0-1,0.4-1,1v9
                                C1,20.6,1.4,21,2,21z M15,15v-3h4v3H15z M13,15H9v-3h4V15z M28.6,15H21v-3h1.3C24.8,12,27.1,13.1,28.6,15z M7,12v3H3v-3H7z"/>
                            <path d="M31,23H1c-0.6,0-1,0.4-1,1s0.4,1,1,1h30c0.6,0,1-0.4,1-1S31.6,23,31,23z"/>
                        </g>
                    </svg>
            </span>
            <div class="container-gares-sfo">
              <span class="sfo">{{$reservation->voyage->rolation_gare_arrivee->name}}</span>
            </div>
            <div class="container-gares-jfkslip">
              <span class="jfk jfkslip">{{$reservation->voyage->rolation_gare_depart->name}}</span>
            </div>
            <span class="plane planeslip">
                <?xml version="1.0" ?>
                <svg clip-rule="evenodd" fill-rule="evenodd" height="50" width="50" id="Icons" image-rendering="optimizeQuality" xmlns:xlink="http://www.w3.org/1999/xlink" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" xml:space="preserve" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g stroke="#222">
                    <g>
                        <path d="M2,21h26.7c1.1,0,2.1-0.5,2.7-1.4c0.6-0.9,0.8-1.9,0.4-2.9c-1.4-4-5.2-6.7-9.6-6.7H2c-0.6,0-1,0.4-1,1v9
                            C1,20.6,1.4,21,2,21z M15,15v-3h4v3H15z M13,15H9v-3h4V15z M28.6,15H21v-3h1.3C24.8,12,27.1,13.1,28.6,15z M7,12v3H3v-3H7z"/>
                        <path d="M31,23H1c-0.6,0-1,0.4-1,1s0.4,1,1,1h30c0.6,0,1-0.4,1-1S31.6,23,31,23z"/>
                    </g>
                </svg>
            </span>
            <div class="container-gares-sfoslip">
              <span class="sfo sfoslip">{{$reservation->voyage->rolation_gare_arrivee->name}}</span>
            </div>
            <div class="sub-content">
              <span class="watermark">Travling</span>
              <span class="name">PASSENGER NAME<br><span>{{$reservation->user->name}}</span></span>
              <span class="flight">PLACE<br><span>{{$reservation->place}}</span></span>
              @php
              if ($reservation->place <= 50) {
                $class = 1;
              }else if ($reservation->place > 50) {
                $class = 2;
              }else if ($reservation->place >= 98) {
                $class = 3;
              }
              @endphp
              <span class="gate">CLASS<br><span>{{$class}}</span></span>
              <span class="boardingtime">BOARDING TIME<br><span>{{$reservation->voyage->date_depart}}</span></span>
                  
              <div id="barcode"></div>
            </div>
          </div>
        </div>
    </div>
  </div>

    <div class="pdf">
      <button class="generate" onclick="genaretePDF()">
        generate ticket as PDF
      </button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script type="text/javascript">
          const token = "{{$reservation->token_id}}"
          var qrcode = new QRCode(document.getElementById("barcode"), {
          text: token,
          width: 90,
          height: 90,
          colorDark : "#000000",
          colorLight : "#fff",
          correctLevel : QRCode.CorrectLevel.H
          });
      </script>
      <script>
        function genaretePDF()
        {
          const classInTrains = "{{$class}}";
          const csrfToken ="{{ csrf_token() }}";
          const data = {
            _token: csrfToken
          }
          var ticket = document.getElementById('box');
          var opt = {
              margin:       1,
              filename:     'MY-ticket.pdf',
              image:        { type: 'jpeg', quality: 0.98 },
              html2canvas:  { scale: 2 },
              jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
            };
            html2pdf().from(ticket).set(opt).save();
            if(classInTrains == 1)
            {
              fetch('http://127.0.0.1:8000/Send-emailThanks', {
                  method: "POST",
                  headers: {
                      "Content-Type": "application/json",
                  },
                  body: JSON.stringify(data),
              })
              .then(response => {
                  if (!response.ok) {
                      throw new Error(`HTTP error! status: ${response.status}`);
                  }
                  return response.json();
              })
              .then(data => {
                  if (data[0] === 'ok') {
                      window.location.href = "/home";
                  }
              })
              .catch(error => {
                  Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: "Something went wrong",
                      footer: '<a href="#">Why do I have this issue?</a>'
                  });
              });

        }
      }
      </script>
</body>
</html>