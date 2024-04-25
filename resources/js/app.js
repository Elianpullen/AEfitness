import './bootstrap';

// Weight Chart
const weightChartConfig = {
    type: "line",
    data: {
        labels: weightDate,
        datasets: [{
            label: "Weight",
            backgroundColor: "hsl(0, 70%, 42%)",
            borderColor: "hsl(0, 70%, 42%)",
            data: weightData,
        }],
    },
    options: {},
};
const weightChart = new Chart(
    document.getElementById("weightChartLine"),
    weightChartConfig
);

// Bodyfat Chart
const bodyfatChartConfig = {
    type: "line",
    data: {
        labels: bodyfatDate,
        datasets: [{
            label: "Body Fat",
            backgroundColor: "hsl(0, 70%, 42%)",
            borderColor: "hsl(0, 70%, 42%)",
            data: bodyfatData,
        }],
    },
    options: {},
};
const bodyFatChart = new Chart(
    document.getElementById("bodyfatChartLine"),
    bodyfatChartConfig
);
