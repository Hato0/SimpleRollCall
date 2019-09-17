<br />
<p align="center">
  <h3 align="center">Roll Call System</h3>

  <p align="center">
    Simple and Easy way to take roll call !
    <br />
    <a href="https://github.com/Hato0/SimpleRollCall"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/Hato0/SimpleRollCall">View Demo</a>
    ·
    <a href="https://github.com/Hato0/SimpleRollCall/issues">Report Bug</a>
    ·
    <a href="https://github.com/Hato0/SimpleRollCall/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Usage](#usage)
* [Roadmap](#roadmap)
* [Contributing](#contributing)
* [Contact](#contact)


<!-- ABOUT THE PROJECT -->
## About The Project

This is a project to take roll call for schools. This System is an easy and fast way to take roll call without any cheats.

Students have to be connected locally with the system (at least the raspberry), so it's quit a garanted of student really in class.

This project was made to conclude our third year in Engineering scool.

### Built With
This section should list any major frameworks that you built your project using. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.
* [Arduino](https://www.arduino.cc)
* [Web Languages](https://www.w3schools.com)

## Getting Started

To build this project you need those elements : 
* ESP32
* Raspberry pi 3
* LCD Screens (at least 2)

### Prerequisites

Firstly you need to configure your Arduino IDE 
* Arduino IDE 
Enter ```sh https://dl.espressif.com/dl/package_esp32_index.json ``` into Additional Board Manager URLs field.
Install the lastest version of esp32 module.
Select your esp32 version on board setings.

* Configure your microsoft environnement 
Install the proper version for your OS version -> ```sh https://www.silabs.com/products/development-tools/software/usb-to-uart-bridge-vcp-drivers```.

### Installation

1. Clone the repo on your raspberry
```sh
https://github.com/Hato0/SimpleRollCall.git
```
3. Put the public_html folder on the root of apache2 server

4. Connect your ESP32 Correctly with screens and everything

5. Change every ip adresse in code by yours proper adress (should me marked)

6. Create your own DataBase.

7. Push the ino file on ESP32 by Arduino IDE


## Usage

You simply have to start the Roll Call by scan the First QrCode and give the housing to student


## Roadmap

See the [open issues](https://github.com/Hato0/SimpleRollCall/issues) for a list of proposed features (and known issues).


## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request


## Contact

Thibaut LOMPECH - thibaut.lompech@insa-cvl.fr

Antoine POUPENEY - antoine.poupeney@insa-cvl.fr

Timothee Cao Van Tuat - timothee.cao_van_tuat@insa-cvl.fr

Francois Guilloux - francois.guilloux@insa-cvl.fr

Maxence Poisson - maxence.pooisson@insa-cvl.fr

Project Link: [https://github.com/Hato0/SimpleRollCall](https://github.com/Hato0/SimpleRollCall)
