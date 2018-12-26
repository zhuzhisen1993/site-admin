import http from '../http';

export default {
    getdata:{
        async getdata(){
            return await http.get('/home')
        },
    },
};
