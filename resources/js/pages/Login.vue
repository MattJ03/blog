<template>
    <NavBar></NavBar>
    <div class="wrapper">
    <img src="/public/whitecircleblack.jpg" class="logo"></img>
    <div class="login-container">
        <form @submit.prevent="submitLogin">
            <h2 class="login-header"> Login </h2>
            <div class="form-group">
                <input type="email" class="email" v-model="email" placeholder="email..."></input>
            </div>
            <div class="form-group">
                <input type="password" class="email" v-model="password" placeholder="password..."></input>
            </div>
            <button type="submit" class="login-btn">Log in </button>
        </form>
    </div>
</div>

</template>
<script setup>
import { ref, reactive, computed } from 'vue';
import { useAuthStore } from '../stores/AuthStore';
import NavBar from '../components/NavBar.vue';
import { useRouter } from 'vue-router';

const email = ref('');
const password = ref('');

const authStore = useAuthStore();
const router = useRouter();

async function submitLogin() {
   await authStore.login(email.value, password.value);
   if(authStore.token) {
    router.push('/');
   }
}

</script>
<style scoped>
.wrapper {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.login-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 0px auto;
    background-color:  #222428;
    color: #F2F0EF;
    border-radius: 16px;
    width: 25%;
    
}
.logo {
    border-radius: 50%;
    height: 100px;
    margin: 2px auto;
    margin-bottom: 1rem;
}
.form-group {
    margin-bottom: 2rem;
    border-radius: 14px;
}
.login-header {
    display: flex;
    justify-content: center;
    align-items: center;
}
.email {
    border-radius: 16px;
    height: 38px;
    background-color: #36454f;
    color: #F2F0EF;
    font-size: 16px;

}
.login-btn {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    height: 55px;
    font-size: 15px;
    border-radius: 16px;
    background-color: #F2F0EF;
    margin-bottom: 20px;
}
.login-btn:hover {
    background-color: #E2DFD2;
}
</style>