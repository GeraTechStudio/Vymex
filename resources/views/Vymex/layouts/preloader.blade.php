<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <style>
    .vymex-animation{width: 100vw; height: 100vh; top: 0; bottom: 0; position: fixed; z-index: 9999999; } .field-animation{overflow: hidden; position: absolute; height: 100vh; top:0; left:0; background-color: #029fe3; -webkit-animation: bounceField 2.2s linear forwards; animation: bounceField 2.2s linear forwards; } @keyframes bounceField {0% {width: 0vw; } 30% {width: 70vw; } 50% {width: 100vw; height: 100vh; } 80% {height: 30vh; } 100% {height: 0vh; } } .loaders ol {margin: 0; padding: 0; list-style: none; display: -webkit-box; display: -moz-box; display: -ms-flexbox; display: -webkit-flex; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -webkit-flex-flow: row wrap; -ms-flex-flow: row wrap; flex-flow: row wrap; -webkit-justify-content: flex-start; justify-content: flex-start; } .loaders ol li {position: relative; width: 100vw; height: 100vh; transition: background 0.35s; display: -webkit-box; display: -moz-box; display: -ms-flexbox; display: -webkit-flex; display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; -webkit-flex-flow: column wrap; -ms-flex-flow: column wrap; flex-flow: column wrap; -webkit-justify-content: center; justify-content: center; /* Spinning Sun */ /* Luminous Circles */ /* Wave */ /* Spinning Square */ /* Drawing Frame */ /* Image Loading */ } .loaders ol li .loader {position: fixed; margin: 0 auto; z-index: 10; } .loaders-blue{z-index: 1; } .loaders ol li .pl-imgloading .loader {width: 76px; height: auto; left: 46%; top: 46%; } .loaders ol li .pl-imgloading .loader span {position: absolute; bottom: 0; left: 0; display: block; width: 100%; height: 0%; background: url({{asset(Config('page-settings.Logo-w'))}}) center bottom; background-repeat: no-repeat; background-size: cover; -webkit-animation: imgLoading 1.3s linear backwards ; animation: imgLoading 1.3s linear backwards ; animation-delay: .4s; transition: 0s; } .loaders ol li .pl-imgloading .loader img {position: relative; z-index: 1; display: block; width: 100%; height: auto; opacity: 0.3; } /* Animations */ @-webkit-keyframes imgLoading {0% {width: 100%; height: 0%; opacity: 1; } 95% {width: 100%; height: 100%; opacity: 1; } 100% {width: 100%; height: 100%; opacity: 0; } } @keyframes imgLoading {0% {width: 100%; height: 0%; opacity: 1; } 95% {width: 100%; height: 100%; opacity: 1; } 100% {width: 100%; height: 100%; opacity: 0; } }
  </style>
<div class="vymex-animation" id="vymexAnim">
  <div class="field-animation">
    <div class="loaders">
      <ol>
        <li>
          <div class="loftloader-wrapper pl-imgloading">
            <div class="loader">
              <span></span>
              <img src="{{asset(Config('page-settings.Logo-w'))}}" alt="loftloader">
            </div>
          </div>
        </li>
      </ol>
    </div>
  </div>
  
</div>    

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum corporis accusantium maxime officiis! Dolor beatae deserunt, magni autem itaque nostrum ex qui aliquid adipisci, soluta quisquam in architecto nulla ut voluptates reiciendis totam, ipsa facere. Quisquam repellat harum doloremque, reprehenderit corrupti architecto. Numquam quam, aliquam, quaerat iste eius suscipit, ea alias necessitatibus nam laboriosam illo sint nisi eveniet! Incidunt velit, illo aperiam perferendis quasi porro voluptas officia maiores ex! Ducimus labore dignissimos nihil. Nemo nam sed reiciendis voluptatem, sit culpa laborum perspiciatis, tempora maiores facere, fugit libero illum beatae ipsam esse ullam harum alias ratione earum incidunt aperiam odio deleniti.
</body>
</html>