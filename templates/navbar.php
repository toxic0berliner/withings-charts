<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navlinks" aria-expanded="false" id="menubutton">
				<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a id="forcerefresh" href="./forcerefresh.php" class="menuicon<?php if ($datarefreshed) {echo ' datarefreshed';}?>">
					<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
				</a>
				<a id="fullscreentoggle" href="#" class="menuicon">
					<span class="glyphicon glyphicon-resize-full" aria-hidden="true" style="vertical-align:-3px;"></span>
				</a>
				<a class="navbar-brand" href="./"><span class="glyphicon glyphicon-scale" aria-hidden="true"></span> Welcome <?=$userFirstName?></a>
			</div>
			<div class="collapse navbar-collapse" id="navlinks">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="./logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="menugraph">Graphs <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#" graphid="fat water muscle">Percentages</a></li>
								<li class="sublevel" legend="true"><a href="#" graphid="fat">Fat</a></li>
								<li class="sublevel" legend="true"><a href="#" graphid="water">Water</a></li>
								<li class="sublevel" legend="true"><a href="#" graphid="muscle">Muscle</a></li>
							<li legend="true"><a href="#" graphid="bone">Bone</a></li>
							<li role="separator" class="divider"></li>
							<li legend="true"><a href="#" class="optionselected" graphid="weight">Weight</a></li>
							<li legend="true"><a href="#" graphid="bmi">BMI</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="menuarea">Area <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#" class="optionselected" graphid="weight">Weight</a></li>
							<li><a href="#" graphid="bmi">BMI</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#" graphid="fat">Fat</a></li>
							<li><a href="#" graphid="water">Water</a></li>
							<li><a href="#" graphid="muscle">Muscle</a></li>
							<li><a href="#" graphid="bone">Bone</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="menunegativecolor">Negative colors <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#" graphid="weight">Weight</a></li>
							<li><a href="#" graphid="bmi">BMI</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#" graphid="fat">Fat</a></li>
							<li><a href="#" graphid="water">Water</a></li>
							<li><a href="#" graphid="muscle">Muscle</a></li>
							<li><a href="#" graphid="bone">Bone</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
