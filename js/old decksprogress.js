/*
var length = $row['Length'];
while ($length > 60) {
	$minutes = $minutes + 1;
	$length = $length - 60;
};
$seconds = $length;
if ($minutes < 10) {
	echo "0";
};
echo $minutes . ":";
if ($seconds < 10) {
	echo "0";
};
echo $seconds;
*/

$(function() {
	var minutes = 0;
	var seconds = 0;
  var DeckALengthText = $('DeckALengthRange').val();
	var DeckALengthRatio = DeckADuration / DeckACurrent;
  $('[type="range"]').on('change input', function() {
    DeckALengthText = $('[id="DeckALengthRange"]').val();
    $('#DeckALengthRange').html(DeckALengthText + '<span></span>');
    /* $('[type="range"], h4>span').css('filter', 'hue-rotate(-' + DeckALengthText + 'deg)') */;
    // $('h4').css({'transform': 'translateX(calc(-50% - 20px)) scale(' + (1+(DeckALengthText/100)) + ')', 'left': DeckALengthText+'%'});
    $('range-text').css({
      /* 'transform': 'translateX(-50%) scale(' + (1 + (DeckALengthText / 100)) + ')', */
      'left': DeckALengthRatio + '%'
    });
  });
});

$(function() {
  var DeckBLengthText = $('id="DeckBLengthRange"').val();
  $('id="DeckBLengthRange"').on('change input', function() {
    DeckBLengthText = $('[type="range"]').val();
    $('range-text').html(DeckBLengthText + '<span></span>');
    /* $('[type="range"], h4>span').css('filter', 'hue-rotate(-' + DeckALengthText + 'deg)') */;
    // $('h4').css({'transform': 'translateX(calc(-50% - 20px)) scale(' + (1+(DeckALengthText/100)) + ')', 'left': DeckALengthText+'%'});
    $('range-text').css({
      /* 'transform': 'translateX(-50%) scale(' + (1 + (DeckALengthText / 100)) + ')', */
      'left': DeckBLengthText + '%'
    });
  });
});
