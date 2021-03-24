(window.webpackJsonp=window.webpackJsonp||[]).push([[7],{77:function(e,t,a){"use strict";a.r(t),a.d(t,"frontMatter",(function(){return o})),a.d(t,"metadata",(function(){return l})),a.d(t,"toc",(function(){return d})),a.d(t,"default",(function(){return s}));var n=a(3),r=a(8),i=(a(0),a(94)),c=a(98),o={id:"introduction",title:"Introduction",sidebar_label:"Introduction",slug:"/"},l={unversionedId:"introduction",id:"introduction",isDocsHomePage:!1,title:"Introduction",description:"Reddit Image Fetcher is a PHP package that can fetch bulk images, memes or wallpapers. Supports raw PHP, Laravel, CakePHP and other PHP frameworks.",source:"@site/docs/introduction.md",slug:"/",permalink:"/reddit-image-fetcher-php/docs/",version:"current",sidebar_label:"Introduction",sidebar:"docs",next:{title:"Installation",permalink:"/reddit-image-fetcher-php/docs/installation"}},d=[{value:"Example",id:"example",children:[]},{value:"Features",id:"features",children:[]},{value:"Demo",id:"demo",children:[]},{value:"Support",id:"support",children:[]},{value:"License",id:"license",children:[]}],u={toc:d};function s(e){var t=e.components,a=Object(r.a)(e,["components"]);return Object(i.b)("wrapper",Object(n.a)({},u,a,{components:t,mdxType:"MDXLayout"}),Object(i.b)("span",{className:"keyword"},"Reddit Image Fetcher")," is a PHP package that can fetch bulk images, memes or wallpapers. Supports raw PHP, Laravel, CakePHP and other PHP frameworks.",Object(i.b)("h2",{id:"example"},"Example"),Object(i.b)("pre",null,Object(i.b)("code",{parentName:"pre",className:"language-php"},"$redditImageFetcher = new RedditImageFetcher();\n$redditImageFetcher->fetch('meme');\n")),Object(i.b)(c.a,{mdxType:"Result"}),Object(i.b)("h2",{id:"features"},"Features"),Object(i.b)("ul",null,Object(i.b)("li",{parentName:"ul"},"Bulk images"),Object(i.b)("li",{parentName:"ul"},"Bulk memes"),Object(i.b)("li",{parentName:"ul"},"Bulk wallpapers"),Object(i.b)("li",{parentName:"ul"},"Customizable"),Object(i.b)("li",{parentName:"ul"},"Lightweight"),Object(i.b)("li",{parentName:"ul"},"Zero dependency")),Object(i.b)("h2",{id:"demo"},"Demo"),Object(i.b)("p",null,"Checkout the package is in action: ",Object(i.b)("a",{parentName:"p",href:"https://memedb.netlify.app"},"https://memedb.netlify.app")),Object(i.b)("h2",{id:"support"},"Support"),Object(i.b)("p",null,"Show your \u2764\ufe0f and support by giving a \u2b50 on ",Object(i.b)("a",{href:"https://github.com/arifszn/reddit-image-fetcher-php"},"Github"),"."),Object(i.b)("h2",{id:"license"},"License"),Object(i.b)("p",null,"MIT Licensed."),Object(i.b)("p",null,"Copyright \xa9 ",Object(i.b)("a",{href:"https://arifszn.github.io",target:"_blank"},"MD. Ariful Alam")," ",(new Date).getFullYear(),"."))}s.isMDXComponent=!0},98:function(e,t,a){"use strict";var n=a(0),r=a.n(n),i=(a(99),a(121)),c=a.n(i),o=a(131),l=a.n(o),d=a(101),u=a(102);t.a=function(e){var t=Object(n.useState)([]),a=t[0],i=t[1];return Object(n.useEffect)((function(){e.data?i(e.data):c.a.fetch().then((function(e){console.log(e),i(e)})).catch((function(e){alert("Error on getting example data")}))}),[]),r.a.createElement("div",{className:"card result-component-wrapper shadow-dim"},r.a.createElement("div",{className:"card__body"},r.a.createElement("div",{className:"json-viewer__body"},a.length?r.a.createElement(l.a,{getItemString:function(e,t,a,n){return r.a.createElement("span",null)},data:a,hideRoot:!1,invertTheme:!1,shouldExpandNode:function(){return!0},keyPath:["result"]}):r.a.createElement("span",{className:"fetching-now"},"Fetching ",r.a.createElement(d.a,{icon:u.b,spin:!0})))))}},99:function(e,t,a){}}]);