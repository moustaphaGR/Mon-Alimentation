const ctx = document.getElementById("myChart");

const myChart = new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: [],
    datasets: [
      {
        label: "",
        data: [],
        borderWidth: false,
        hoverOffset: 20,
        backgroundColor: [],
      },
    ],
  },
  options: {
    responsive: true,
    cutout: "90%",
    plugins: {
      legend: false,
    },
    layout: {
      padding: 20,
    },
  },
});

function sliderChangeHeight(val) {
  document.getElementById("output").innerHTML = val;
}
//document.getElementById("height").value = 187;

function sliderChangeWeight(val) {
  document.getElementById("outputWeight").innerHTML = val;
}

//document.getElementById("weight").value = 80;

/*var addMealButton = document.getElementById("btnMeal");
var modal = document.getElementById("myModal");
var mealContainer = document.querySelector(".mealContainer");
var kcal = document.querySelector(".doughnut>.kcal");
var calorieCounter = 0;

function addMeal() {
  var mealName = document.getElementById("inputRepas").value;
  var mealDescription = document.getElementById("inputCalories").value;

  var mealElement = document.createElement("div");
  var mealTitle = document.createElement("div");
  var mealCalories = document.createElement("div");
  var row = document.createElement("div");
  var col = document.createElement("div");

  mealElement.className = "food";
  mealTitle.className = "titleFood";
  mealCalories.className = "kgFood";
  row.className = "row";
  col.className = "col";

  mealTitle.innerHTML = `<p>${mealName}</p>`;
  mealCalories.innerHTML = `<p>${mealDescription} kcal</p>`;

  mealElement.appendChild(mealTitle);
  mealElement.appendChild(mealCalories);
  col.appendChild(mealElement);
  row.appendChild(col);

  mealContainer.appendChild(row);

  myChart.data.labels.push(mealName);
  myChart.data.datasets[0].data.push(parseInt(mealDescription));

  var getColor = getRandomColor();
  myChart.data.datasets[0].backgroundColor.push(getColor);

  calorieCounter = calorieCounter + parseInt(mealDescription);
  kcal.innerHTML = `${calorieCounter} Kcal`;

  myChart.update();

  $('#myModal').modal('hide');

  //send the data to the server using an AJAX request
  window.onload = function() {
    
  }
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("mealName=" + mealTitle.textContent + "&calories=" + mealCalories.textContent);
}

function removeMeal() {
  const lastChild = document.querySelector(".mealContainer>.row:last-of-type");

  mealContainer.removeChild(lastChild);
  myChart.data.labels.pop();
  var popValue = myChart.data.datasets[0].data.pop();
  calorieCounter = calorieCounter - popValue;
  kcal.innerHTML = `${calorieCounter} Kcal`;

  myChart.update();
}*/

/*function getRandomColor() {
  const r = Math.floor(Math.random() * 256);
  const g = Math.floor(Math.random() * 256);
  const b = Math.floor(Math.random() * 256);
  return `rgb(${r}, ${g}, ${b})`;
}*/


/*addMealButton.addEventListener("click", addMeal);*/

// Send an ajax request to retrieve the meal data

/*fetch('index.php')
  .then(response => response.json())
  .then(meal => {
    // The meal data is now available in the meal variable
    console.log(meal);
  })
  .catch(error => {
    // An error occurred
    console.error(error);
  });*/