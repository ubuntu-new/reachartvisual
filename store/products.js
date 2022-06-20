const state = () => ({
    all: [
        {
            id: 1,
            name: 'Classic Bagget',
            price: 300.00,
            offer: false,
            offerPrice: 3,
            latest: true,
            bestSellers: false,
            trending: false,
            image: require('../assets/img/img1.jpg'),
            imageHover: require('../assets/img/img-hover1.jpg'),
            timePeriod: true,
            dateTime: new Date("December 30, 2021 17:00:00 PDT")
        },
        {
            id: 2,
            name: 'Classic Bagget',
            price: 300.00,
            offer: false,
            offerPrice: 3,
            latest: true,
            bestSellers: false,
            trending: false,
            image: require('../assets/img/img2.jpg'),
            imageHover: require('../assets/img/img-hover2.jpg'),
            timePeriod: true,
            dateTime: new Date("March 19, 2021 17:00:00 PDT")
        },
        {
            id: 3,
            name: 'Classic Baggetssssss',
            price: 166.00,
            offer: true,
            offerPrice: 5,
            latest: true,
            bestSellers: true,
            trending: false,
            image: require('../assets/img/img3.jpg'),
            imageHover: require('../assets/img/img-hover3.jpg'),
            timePeriod: true,
            dateTime: new Date("march 19, 2021 17:00:00 PDT")
        },
        {
            id: 4,
            name: 'Classic Bagget',
            price: 200.00,
            offer: false,
            offerPrice: 7,
            latest: true,
            bestSellers: false,
            trending: false,
            image: require('../assets/img/img4.jpg'),
            imageHover: require('../assets/img/img-hover4.jpg'),
            timePeriod: false,
            dateTime: new Date("December 19, 2020 17:00:00 PDT")
        },
     
        {
            id: 6,
            name: 'Classic Bagget',
            price: 177.00,
            offer: false,
            offerPrice: 7,
            latest: true,
            bestSellers: false,
            trending: false,
            image: require('../assets/img/img6.jpg'),
            imageHover: require('../assets/img/img-hover6.jpg'),
            timePeriod: false,
            dateTime: new Date("December 19, 2020 17:00:00 PDT")
        },
            
    ]
});

export default {
    state
};