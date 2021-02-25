(function(){
				let alone={};
				alone.imgView=function(){
					if(alone.config.eleBox){
						let ele=getEle(alone.config.eleBox);
						if(ele){
							var imgList=ele.getElementsByTagName('img')
						}else{
							return false;
						}
					}else{
						var imgList=document.getElementsByTagName('img');
					}
					let imgViewBox=document.createElement('div');
					imgViewBox.setAttribute('class',alone.config.class ?? 'alone');
					imgViewBox.setAttribute('style','display: none;padding:2% 0;position: fixed;top: 0;left: 0;bottom:0;width: 100%;background-color: rgba(255, 255, 255,0.8);z-index: 99999;align-content: center;justify-content: center')
					imgViewBox.innerHTML='<img style="cursor: zoom-in;max-width: 80%;min-width: 30%;">';
					document.body.appendChild(imgViewBox);
					for(let i=0;i < imgList.length;i++){
						imgList[i].addEventListener('click',imgView)
					}

					/**
					 * 设置图片src，让图片显示
					 */
					function imgView(){
						imgViewBox.style.display='flex';
						imgViewBox.children[0].setAttribute('src',this.src);
					}

					/**
					 * 根据传递的选择器，返回一个对象
					 * @param {Object} e
					 */
					function getEle(e){
						let type=e.substr(0,1);
						if(type==='#'){
							return document.getElementById(e.substr(1));
						}else if(type==='.'){
							return document.getElementsByClassName(e.substr(1))[0];
						}else{
							return document.getElementsByTagName(e)[0];
						}
					}

					imgViewBox.addEventListener('click',function(e){
					    if (e.path[0].tagName!='IMG'){
                            imgViewBox.style.display='none';
                        }
					    // console.log(e.path[0].tagName)
					})
				}
				window.alone=alone;
			})(window)
