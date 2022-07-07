<template>
    <div>
        <div v-bind:class="{show_danger: this.error}" role="alert">
            {{ error }}
        </div>
        <div v-bind:class="{show_success: this.msg}" role="alert">
            {{ msg }}
        </div>
        <div class="text-center mt-16">
            <h2 class="text-4xl tracking-tight">
                Sign in into your account
            </h2>
            <span class="text-sm">or <a href="#" class="text-blue-500">
                register a new account
            </a>
        </span>
        </div>
        <div class="flex justify-center my-2 mx-4 md:mx-0">
        <form class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>Email address</label>
                    <input v-model="email" name="email" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='email'  required>
                </div>
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>Password</label>
                    <input v-model="password" name="password" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='password' required>
                </div>
                <div class="w-full flex items-center justify-between px-3 mb-3 ">
                    <div>
                    <a href="#" class="text-blue-500 text-sm tracking-tight">Forget your password?</a>
                    </div>
                </div>
                <div class="w-full md:w-full flex px-3 mb-6">
                    <button @click.prevent="login" class="mr-2 appearance-none block w-full bg-blue-400 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500">Sign in</button>
                    <button @click.prevent="registration" class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500">Sign up</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import router from '../routes.js'

export default {
  name: 'MyReg',
  data () {
    return {
      email: null,
      password: null,
      error: null,
      msg: null
    }
  },
  methods: {
    async registration () {
      try {
        await axios.post('http://127.0.0.1:8000/api/register',
          {
            email: this.email,
            password: this.password
          })
          .then(msg => {
            this.msg = msg.response.data.message
          })
          .catch(err => {
            if (err.response.data.message === 'Route [/] not defined.') {
              router.push({ name: 'MyHome' })
              this.msg = err.response.data.message
            }
            this.error = err.response.data.message
          })
      } catch (e) {}
    },
    async login () {
      await axios.post('http://127.0.0.1:8000/api/login',
        {
          email: this.email,
          password: this.password
        })
        .then(msg => {
          this.msg = msg.response.data.message
        })
        .catch(err => {
          this.error = err.response.data.message
        })
    }
  }
}
</script>
<style>

.show_danger {
  padding: 10px;
  margin-bottom: 4px;
  background: rgb(235, 68, 68);
  color: white;
  border: rgb(235, 68, 68);
}

.show_success {
  padding: 10px;
  margin-bottom: 4px;
  background: rgb(112, 219, 70);
  color: white;
  border: rgb(112, 219, 70);
}

</style>
