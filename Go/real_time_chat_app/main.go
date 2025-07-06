package main

import (
	"fmt"
	"log"

	"github.com/gofiber/fiber/v2"
	"github.com/gofiber/fiber/v3/middleware/cors"
	"github.com/pusher/pusher-http-go/v5"
)

func main() {
	// Initialize a new Fiber app
	app := fiber.New()

	app.Use(cors.New())

	pusherClient := pusher.Client{
		AppID:   "1981473",
		Key:     "b18d11739da4be71a28a",
		Secret:  "4f32b20631f3e87a6fad",
		Cluster: "ap3",
		Secure:  true,
	}

	// Define a route for the GET method on the root path '/'
	app.Post("/api/message", func(c *fiber.Ctx) error {
		var data map[string]string

		if err := c.BodyParser(&data); err != nil {
			return err
		}

		err := pusherClient.Trigger("real_time_chat_app", "message", data)
		if err != nil {
			fmt.Println(err.Error())
		}

		return c.JSON([]string{})
	})

	// Start the server on port 3000
	log.Fatal(app.Listen(":3000"))
}
