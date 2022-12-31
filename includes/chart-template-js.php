<script>
myChart.data.labels.push('<?php echo $value['name']; ?>');
myChart.data.datasets[0].data.push(<?php echo $value['calorie']; ?>);

function getRandomColor() {
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return `rgb(${r}, ${g}, ${b})`;
}

var getColor = getRandomColor();
myChart.data.datasets[0].backgroundColor.push(getColor);

myChart.update();
</script>