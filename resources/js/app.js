import './bootstrap';

// Weight chart
const data = {
    labels: weightDate,
    datasets: [
        {
            label: "Weight(KG)",
            backgroundColor: "hsl(252, 82.9%, 67.8%)",
            borderColor: "hsl(252, 82.9%, 67.8%)",
            data: weightData,
        },
    ],
};
const configLineChart = {
    type: "line",
    data,
    options: {},
};
var chartLine = new Chart(
    document.getElementById("weightChartLine"),
    configLineChart
);

// Bodyfat Chart
const bodyfatChartConfig = {
    type: "line",
    data: {
        labels: bodyfatDate, // Assuming dateData is shared between weight and body fat charts
        datasets: [{
            label: "Body Fat",
            backgroundColor: "hsl(252, 82.9%, 67.8%)",
            borderColor: "hsl(252, 82.9%, 67.8%)",
            data: bodyfatData,
        }],
    },
    options: {}, // You can customize options as needed
};
const bodyFatChart = new Chart(
    document.getElementById("bodyfatChartLine"), // Assuming you have an HTML element with id="bodyFatChartLine"
    bodyfatChartConfig
);
