
	

	<div id="container">
		<header>
			<h1>grumble.js</h1>
		</header>
		<div id="main" role="main">
			<br/>
			
					<h2>Examples</h2>
			<p>
				The following code animates a set of grumbles, <a href="#" id="ex1">click here</a> to
				see it in action.
			</p>
			
			<span class="ex" id="grumble1">No text</span>
			<span class="ex" id="grumble2">Different style</span>
			<span class="ex" id="grumble3">With close button</span>
			<span class="ex" id="grumble4">Enlarged for text</span>
			
			<br/><br/>
		</div>
		
		<h2 id="thedarkside">The darkside of grumble.js</h2>
        <p>
			Warning: Clicking on this link may damage your <abbr title="User Experience">UX</abbr>. <a href="#" id="darkside">(:p)</a>
		</p>
        
		<p>
			grumble.js exposes three methods, 'show', 'hide' and 'adjust'. The adjust call allows you to update position and angle.
		</p>
		
		
	</div> <!-- eo #container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/jquery.grumble.min.js?v=5"></script>
	<!-- script src="js/Bubble.js?v=5"></script>
	<script src="js/jquery.grumble.js?v=5"></script -->

	<script>
	
		$('h1').grumble(
			{
				text: 'Bubble-tastic!', 
				angle: 85, 
				distance: 100, 
				showAfter: 500
			}
		);
	
		var isSequenceComplete = true;
		$('#caribbean').click(function(e){
		
			e.preventDefault();
		
			if(isSequenceComplete === false) return true;
			isSequenceComplete = false;
			
			//$('#grumble1').grumble(
//				{
//					text: '', 
//					angle: 200, 
//					distance: 3, 
//					showAfter: 20,
//					hideAfter: 2000
//				}
//			);
//			$('#grumble2').grumble(
//				{
//					text: 'Ohh, blue...', 
//					angle: 180, 
//					distance: 0, 
//					showAfter: 50,
//					type: 'alt-', 
//					hideAfter: 2000
//				}
//			);
//			$('#grumble3').grumble(
//				{
//					text: 'Click me!',
//					angle: 150,
//					distance: 3,
//					showAfter: 100,
//					hideAfter: false,
//					hasHideButton: true, // just shows the button
//					buttonHideText: 'Pop!'
//				}
//			);
			
			
			
			$('#grumble4').grumble(
				{
					text: 'The Caribbean',
					angle: 25,
					distance: 50,
					showAfter: 200,
					hideAfter: false,
					hasHideButton: true, // just shows the button
					buttonHideText: 'Pop!',
					onHide: function(){
						isSequenceComplete = true;
					}
				}
			);

		});
	
		$('#darkside').click(function(e){
			var $me = $(this), interval;
			
			e.preventDefault();
			
			$me.grumble(
				{
					angle: 130,
					text: 'Look at me!',
					type: 'alt-', 
					distance: 10,
					hideOnClick: true,
					onShow: function(){
						var angle = 130, dir = 1;
						interval = setInterval(function(){
							(angle > 220 ? (dir=-1, angle--) : ( angle < 130 ? (dir=1, angle++) : angle+=dir));
							$me.grumble('adjust',{angle: angle});
						},25);
					},
					onHide: function(){
						clearInterval(interval);
					}
				}
			);
		});
	
	</script>
	
	

</body>
</html>