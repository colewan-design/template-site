<template>
  <v-container class="dashboard-body">
      <div class="flex-fill">
          <v-row>
             <v-col cols="12" sm="4" md="6" xl="12">
                <v-card class="user-profile-card" >
                  <v-sheet style="padding: 2rem;">
                    <v-row justify="center">
                      <v-spacer></v-spacer>
                      <v-col>
                        <!-- Hidden file input element -->
                        <input
                          type="file"
                          accept="image/*"
                          ref="fileInput"
                          style="display: none"
                          @change="handleImageUpload"
                        />
                        <v-menu>
                          <template v-slot:activator="{ props }">
                          
                            <v-row>
                             <v-col></v-col>
                             <v-col>
                              <v-btn icon v-bind="props">
                              <v-avatar  
                              color="info"
                              size="100"
                              class="v-avatar-class"
                             >
                                <span class="text-h5">{{ user.initials }}</span>

                              </v-avatar>
                            </v-btn>
                             </v-col>
                             <v-col></v-col>
                            </v-row>
                    
                          </template>
                          <v-card>
                            <v-card-text>
                              <div class="mx-auto text-center">
                                <v-btn rounded variant="text"  @click="openFileInput"> Add Photo </v-btn>
                                <v-divider class="my-3"></v-divider>
                                <v-btn rounded variant="text"> Sign Out </v-btn>
                              </div>
                            </v-card-text>
                          </v-card>
                        </v-menu>
                      </v-col>
                      <v-spacer></v-spacer>
                    </v-row>
                  </v-sheet>
                  <v-card-title class="text-center" style="padding: 2rem;">John Doe</v-card-title>
                  <v-card-text>
                    <v-list dense>
                      <v-list-item>
                        <v-list-item-icon>
                          <v-icon>mdi-email</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Email:</v-list-item-title>
                          <v-list-item-subtitle>john.doe@example.com</v-list-item-subtitle>
                        </v-list-item-content>
                      </v-list-item>

                      <v-list-item>
                        <v-list-item-icon>
                          <v-icon>mdi-phone</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Phone:</v-list-item-title>
                          <v-list-item-subtitle>+1 (555) 123-4567</v-list-item-subtitle>
                        </v-list-item-content>
                      </v-list-item>

                      <v-list-item>
                        <v-list-item-icon>
                          <v-icon>mdi-map-marker</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Location:</v-list-item-title>
                          <v-list-item-subtitle>New York, USA</v-list-item-subtitle>
                        </v-list-item-content>
                      </v-list-item>
                    </v-list>
                  </v-card-text>
                </v-card>
              </v-col>
          </v-row>
      </div>
  </v-container>
</template>

<script>
  import router from '../routes.js';
  export default {
    data: () => ({
      name: "UserProfile",
      user: {
        initials: 'JD',
        fullName: 'John Doe',
        email: 'john.doe@doe.com',
      },
      drawer: false,
    }),
    methods: {
    openFileInput() {
      // Programmatically trigger the file input when the avatar is clicked
      this.$refs.fileInput.click();
    },
    handleImageUpload(event) {
      // Handle the image upload here
      const file = event.target.files[0];
      // You can now use the selected file to update the user profile image
      // For example, you can use FileReader to preview the image:
      const reader = new FileReader();
      reader.onload = (e) => {
        const imageUrl = e.target.result;
        // Update the avatar image source with the uploaded image URL
        // For example: this.imageUrl = imageUrl;
      };
      reader.readAsDataURL(file);
    },
  },

  }
</script>

<style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@1,500&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

  /* mobile view */
  @media only screen and (max-width: 600px) {

      h1{
          font-weight: bold;
          text-transform: uppercase; 
          font-size:32px !important;
      }
      p{
          font-size: 	21.333px;
      }
  }
  body {
      font-family: 'Inter', sans-serif;
  }

  .dashboard-body{
      padding: 0;
      padding-right: 2rem;
      padding-top: 2rem;
      margin: 0;
      box-sizing: border-box;
  }

  .navigation_bar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 8rem;
      width: 100%;
      background-color: #4d783f;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem 7%;
      box-sizing: content-box;
      box-shadow: var (--box-shadow);
      z-index: 1000;
  }

  .left_section {
      display: flex;
      align-items: center;
  }

  .logo {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #ffffff;
  }

  .company_name {
      color: #ffffff;
      margin-left: 10px;
      font-weight: bold;
      font-family: 'Gelasio', serif;
      font-style: italic;
  }

  .right_section {
      display: flex;
      align-items: center;
  }

  .navigation_links {
      display: flex;
      list-style: none;
      margin-right: 20px;
      justify-content: center;
      align-items: center;
      padding: 1rem;
      border-bottom: 2px solid transparent;
  }

  .navigation_links li {
      color: #ffffff;
      margin-right: 15px;
      cursor: pointer;
  }

  .content_section {
      margin-top: 150px;
      margin-left: 100px;
  }

  h1 {
      font-size: 45px;
      font-weight: 600;
      font-style: italic;
      font-family: 'Gelasio', serif;
      color: #2d4d22;
  }

  p {
      font-size: 20px;
      color: #000;
  }

  .navigation_bar {
      height: 100px;
      width: 100%;
      background-color: #4d783f;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 50px;
      font-family: 'Inter', sans-serif;
      font-size: 20px;
      color: #ffffff;

  }

  .navigation_section ul {
      list-style-type: none;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
      padding: 0;
  }

  .navigation_section ul li {
      margin-right: 20px;
  }

  .navigation_section ul li a {
      color: white;
      text-decoration: none;
      font-size: 16px;
      font-weight: bold;
      font-family: 'Inter', sans-serif;
  }


  .logo {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: white;
  }

  .company_name {
      margin-left: 10px;
      font-size: 50px;
      color: white;
  }


  .user_section {
      display: flex;
      align-items: center;
  }

  .button_set_a {
      /* width: 158px;
      height: 52px; */
      border-radius: 13px;
      background-color: #2d4d22;
      font-family: 'Inter', sans-serif;
      font-weight: bold;
      font-size: 18px;
      color: #ffffff;
  }

  .sign_up_button {
      width: 158px;
      height: 52px;
      border-radius: 13px;
      background-color: #C7C47F;
      font-family: 'Inter', sans-serif;
      font-weight: bold;
      font-size: 18px;
      color: #2d4d22;

  }
</style>
