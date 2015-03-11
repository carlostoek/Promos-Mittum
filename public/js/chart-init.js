var data = [
    {"value":data.valor1,"label":"Enviados","formatted":data.formatted1},
    {"value":data.valor2,"label":"Ganadores","formatted":data.formatted2}
];

// Use Morris.Area instead of Morris.Line
Morris.Donut({
    element: 'graph-donut',
    data: data,
    backgroundColor: false,
    labelColor: '#fff',
    colors: [
        '#4acacb','#6a8bc0','#5ab6df','#fe8676'
    ],
    formatter: function (x, data) { return data.formatted; }
});