let urlPattern = /\b(?:https?):\/\/[a-z0-9-+&@#\/%?=~_|!:,.;]*/gim;
let content = 'Homepage: http://opentutorials.org/course/1 Naver: http://naver.com';
let result1 = content.replace(urlPattern, function(url){
    return '<a href="'+url+'">'+url+'</a>';
});
console.log(result1);
