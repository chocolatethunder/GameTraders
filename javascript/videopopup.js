
         ////////////////////////////////////////////////////////////////////////////////
         // Video window function, handles urls, sets up embeds, makes window visible/invisible
         ////////////////////////////////////////////////////////////////////////////////

         function playVid(vidId, noBlackout) {

            ////////////////////////////////////////////////////////////////////////////////
            // Test to see if our video and blackout divisions have been set up.
            // If no division was declared in the HTML then we'll go ahead and automatically
            // create and style the necessary division.
            ////////////////////////////////////////////////////////////////////////////////

            if (_vidPane==null) {
               ////////////////////////////////////////////////////////////////////////////////
               /// Video Pane wasn't set up so see if it's declared in the HTML
               ////////////////////////////////////////////////////////////////////////////////
               _vidPane=document.getElementById('vidPane');
               if (!_vidPane) {
                  // user didn't create the division so create it for him.
                  // also asume no styleSheet and set basic styles.
                  var tbody = document.getElementsByTagName("body")[0];
                  tnode = document.createElement('div');
                  tnode.id='vidPane';
                  tnode.className='vidFrame';
                  tbody.appendChild(tnode);
                  _vidPane=document.getElementById('vidPane');
                  _vidPane.style.position='absolute';
                  _vidPane.style.display='none';
                  _vidPane.style.width='500px';
                  _vidPane.style.height='450px';
				  _vidPane.style.color='#ffffff';
                  _vidPane.style.fontFamily='verdana';
                  _vidPane.style.fontSize='9pt';
                  _vidPane.style.zIndex='100';
                  _vidPane.style.MozBorderRadius='10';
               }

               // If _vidPane wasn't defined then for sure _blackout wasn't
               // so see if it was defined in the HTML
               _blackout=document.getElementById('blackout');

               if (!_blackout) {
                  // user didn't create the division so create it for him.
                  // also asume no styleSheet and set basic styles.
                  tnode = document.createElement('div');
                  tnode.id='blackout';
                  tbody.appendChild(tnode);
                  _blackout=document.getElementById('blackout');
                  _blackout.style.position='absolute';
                  _blackout.style.display='none';
				  _blackout.style.marginBottom='0px';
                  _blackout.style.left='0px';
                  _blackout.style.top='0px';
                  _blackout.style.backgroundColor='#000000';
                  _blackout.style.opacity='.6';
                  _blackout.style.filter='alpha(opacity=50)';
                  _blackout.style.zIndex='50';
               }
               // Initialize the starting location of the video. 
               _vidPane.style.top='75px';    // Starting location horozontal
               _vidPane.style.left='300px';   // Starting location verticle
            }

            // Shows (or hides) the vidPane layer.   Accepts 2 parameteres.
            // vidId is null (close window) or an anchor object (contains HREF value)
            // vidId is mandatory example: <a href="someservice.com/somevideo.swf" onClick='return playVid(this);'></a>
            // noBlackout is optional. If you pass true, the background will not be "greyed out".

            if (vidId==null) { 
               // Null is passed by the "close" link, so we'll hide the layer.
               _vidPane.style.display='none';         // Hide the division.
               _vidPane.innerHTML='';                 // purge it's html (kill video)
               _blackout.style.display='none';        // Hide the blackout layer.
            } else {
               // Snag the url from the passed object
               vidId=vidId.href;

               // Next three lines make the blackout layer visible
               // and makes sure it covers the entire page.
               if (!noBlackout) {
                  _blackout.style.width='100%';
                  _blackout.style.height=(document.body.offsetHeight<screen.height) ? screen.height+'px' : document.body.offsetHeight+20+'px';
                  _blackout.style.display='block';
               } else {
                  _blackout.style.display='none';        // Hide the blackout layer.
               }
               // Break out the URL passed to this function (so vidInfo[0]=http, [1]=domain, etc
               var vidInfo = vidId.split('/');

               // We're building a temporary string called vidstring. 
               // vidstring will hold the HTML as we build it based on the service
               // being used.  The next few lines contains items which are common
               // to all the services, or at least ignored if not directly used.
               
               //var vidstring ='&nbsp;<A HREF="'+vidId+'">LINK</A>';
               var vidstring ='<br>&nbsp;<div style="float:right; margin-right:36px;"><A HREF="#" class="close" onClick="return(playVid())">Close</A></div><br/><br/>';
               vidstring+='<center><embed style="margin-top: 5px;"';  
               vidstring+=' enableJavascript="false" allowScriptAccess="never"';
               vidstring+=' allownetworking="internal" type="application/x-shockwave-flash"';
               vidstring+=' wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" ';

               if (vidInfo[2].indexOf('youtube.com')>=0) {
                  ////////////////////////////////////////////////////////////////////////////////
                  // YouTube (Use browser URL, autoplays)
                  ////////////////////////////////////////////////////////////////////////////////
                  vidInfo=vidId.match(/v=.+$/);
                  vidInfo=String(vidInfo).replace(/v=/g,'');
                  vidstring+=' src="http://www.youtube.com/v/'+vidInfo+'&ap=%2526fmt%3D18&autoplay=1" ';
                  vidstring+=' height="350" width="425"></embed></center>';
				  vidstring+=' <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.youtube.com?v='+vidInfo+'" class="original" >Original Video</a>';
               } else {
                  ////////////////////////////////////////////////////////////////////////////////
                  // Failed.
                  ////////////////////////////////////////////////////////////////////////////////
                  vidstring += '></embed><BR><BR><BR>Unknown video service.</center>';
               }
               // Insert our HTML and display the video window.
               _vidPane.innerHTML=vidstring;
               // Set the Y position of the video window so it's in the visible clip
               var scrollTop = 0;
               if (document.documentElement && document.documentElement.scrollTop)
	                scrollTop = document.documentElement.scrollTop;
               else if (document.body)
	                scrollTop = document.body.scrollTop
               _vidPane.style.top=scrollTop+50+'px';
               // Video window was hidden so we'll make it visible
               _vidPane.style.display='block'; 
            }
            // return false so the browser won't follow through with A HREF clicks.
            return(false);
         }

         ////////////////////////////////////////////////////////////////////////////////
         // Drag and Grab handlers
         ////////////////////////////////////////////////////////////////////////////////

         function moveHandler(e){
            // Called automatically whenever the mouse is moved after a drag event starts
            if (e == null) { e = window.event }  // Get event data, if it wasn't passed, get it IE style.
            if ( _dragOK ){                      // is our global var set to true? is it ok to move the object?
               _savedTarget.style.left=e.clientX-_dragXoffset+'px';  //OK to move, calculate the offset and move it
               _savedTarget.style.top=e.clientY-_dragYoffset+'px';   // calculate the y offset and move it.
               return false;                                         // return false so browser doesn't try to do anything else.
            }                                   // End _dragOK check
         }                                      // End moveHandler
      
         function cleanup(e) {
            // Called whenever user lets up off a mouse button after a drag event starts
            document.onmousemove=null;                     // Turn off the mousemove event (won't call moveHandler() now).
            document.onmouseup=null;                       // Turn off the mouseup event (won't call cleanup() now).                     
            _savedTarget.style.cursor=_orgCursor;          // Restore original mouse shape
            _dragOK=false;                                 // Turn off the global constant we look for before moving stuff.
         }
      
         function dragHandler(e){
            // Called automatically when user holds down the mouse button
            var cursorType='-moz-grabbing';                               // Set mouse type to grabbing hand
            if (e == null) { e = window.event; cursorType='move';}        // This is IE so get event info IE style
            var target = e.target != null ? e.target : e.srcElement;      // Save object of the event
            if (target.className=="vidFrame") {                           // Did mouse go down over our dragable object?
               _orgCursor=target.style.cursor;                            // Remember the current mouse shape
               _savedTarget=target;                                       // Remember the object we're working with
               target.style.cursor=cursorType;                            // change mouse to "grab" icon                             
               _dragOK=true;                                              // When true, movehandler will move the window
               _dragXoffset=e.clientX-parseInt(_savedTarget.style.left);  // Remember current X offset
               _dragYoffset=e.clientY-parseInt(_savedTarget.style.top);   // Remember current Y offset
               document.onmousemove=moveHandler;                          // Call moveHandler() when mouse moves
               document.onmouseup=cleanup;                                // Call cleanup() when user lets go of mouse btn
               return false;                                              // IMPORTANT return false so browser doesn't do anything else.
            }                                                             // End Click on classname = object check
         }                                                                // End function dragHandler

         // Start the event handler. When mouse is clicked, call dragHandler()	 
      	 document.onmousedown=dragHandler;

         // Initialize global variables.
         var _savedTarget=null;        // The target layer (effectively vidPane)
         var _orgCursor=null;          // The original Cursor (mouse) Style so we can restore it
         var _dragOK=false;            // True if we're allowed to move the element under mouse
         var _dragXoffset=0;           // How much we've moved the element on the horozontal
         var _dragYoffset=0;           // How much we've moved the element on the verticle
         var _vidPane = null;          // Video Layer -- won't be defined until a video is called
         var _blackout= null;          // blackout Layer. -- won't be defined until a video is called.
