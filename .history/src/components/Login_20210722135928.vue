<template>
  <div class="login_container">
    <div class="login_box">
      <div class="avatar">
        <img src="../assets/logo.jpg" alt="">
      </div>
      <el-form ref="loginFormRef" label-width="0" class="login_form" :model="loginForm" :rules="loginFormRules">
        <el-form-item prop="username">
          <el-input v-model="loginForm.username" prefix-icon="el-icon-s-custom" auto-complete="off" />
        </el-form-item>
        <el-form-item prop="password">
          <el-input v-model="loginForm.password" prefix-icon="el-icon-lock" type="password"  auto-complete="new-password" />
        </el-form-item>
        <el-form-item class="btns">
          <el-button type="primary" @click="login">登录</el-button>
          <el-button type="info" @click="resetLoginForm">重置</el-button>
        </el-form-item>
      </el-form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loginForm: {
        username: '',
        password: ''
      },
      loginFormRules: {
        username: [
          {
            required: true,
            message: '请输入账号',
            trigger: 'blur'
          },
          {
            min: 3,
            max: 20,
            message: '长度在3-20个字符',
            trigger: 'blur'
          }
        ],
        password: [
          {
            required: true,
            message: '请输入密码',
            trigger: 'blur'
          },
          {
            min: 6,
            max: 15,
            message: '密码长度在6-15位之间',
            trigger: 'blur'
          }
        ]
      }
    }
  },
  methods: {
    resetLoginForm() {
      this.$refs.loginFormRef.resetFields()
    },
    login() {
      this.$refs.loginFormRef.validate(async(valid) => {
        if (!valid) {
          return
        }
        debugger
        const res = await this.$http.post('login', this.loginForm)
        
        // const { data: result } = await this.$http.post('login', this.loginForm)
        // console.log(result)
        // if (result.meta.status !== 200) {
        //   return this.$message.error('login faild')
        // }
        // this.$message.success('login success')
        // window.sessionStorage.setItem('token', result.data.token)
        // this.$router.push('/home')
      })
    }
  }
}
</script>
<style lang='less' scoped>
  .login_container {
    background-color: #2b4b6b;
    height: 100%;
  }
  .login_box {
    width: 450px;
    height: 300px;
    background-color: #fff;
    border-radius: 3px;
    position: absolute;
    left: 50%;
    top:50%;
    transform: translate(-50%, -50%);
    .avatar {
      width: 130px;
      height: 130px;
      border: 1px solid #eee;
      border-radius: 50%;
      padding: 10px;
      box-shadow: 0 0 10px #ddd;
      position: absolute;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #eee;
      }
    }
  }
  .btns {
    display: flex;
    justify-content:flex-end;
  }
  .login_form {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 0 20px;
    box-sizing: border-box;
  }
</style>