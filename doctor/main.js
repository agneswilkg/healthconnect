/*Vue.component('past-visit', {
    template: '#apps-template',
    props: ['when', 'what']
})*/

//gets previous appointments and posts current
new Vue({
    el: '#past-apps',
    data: {
        patient: [
            { 'id': '', 'idCard': '',
              'Name': 'John', 'surName': 'Lemon',
              'address': 'Poniedziałkowy Dół 13',
            },
        ],        
        visits: [
            { 'id': '1', 'date': '19.11.2017', 'desc': 'cholera' },
            { 'id': '2', 'date': '20.11.2017', 'desc': 'mnie' },
            { 'id': '3', 'date': '21.11.2017', 'desc': 'bierze' },
        ]
    },
    methods: {
        getPastApps: function() {
            
        },
        postThisApp: function() {
            console.log('Hi!');
            alert('Hey! I work! Look!');
        }
    },
});

new Vue({
    el: '#queue',
    data: {
        patients: [
            { 'id': '', 'Name': 'Donald', 'surName': 'Trump', 'disease': 'Lorizzle Ipsizzle Bang', 'time': '12:45' },
            { 'id': '', 'Name': 'Donald', 'surName': 'Trump', 'disease': 'Nieprzespane noce', 'time': '13:00' },
            { 'id': '', 'Name': 'Donald', 'surName': 'Trump', 'disease': 'Gorączka i inne rzeczy', 'time': '13:15' },
        ],
        humanBeings: [],
    },
    methods: {
        getWaitingList: function() {
            this.$http.get('http://192.168.0.101/HealthConnect').then(function(response) {
                this.humanBeings = response.body;
                console.log(humanBeings);
                console.log('hi there!');
            });
        }
    }
})