using UnityEngine;
using System.Collections;
using UnityEngine.UI;

[RequireComponent(typeof(AudioSource))]
public class playerMove : character {


	// private fields so they cannot be edited openly in the inspector.
	private Rigidbody2D playerRigidbody;


	private bool slide;

	[SerializeField]
	private Transform[] groundPoints;

	[SerializeField]
	private float groundRadius;

	[SerializeField]
	private LayerMask whatIsGround;


	private bool playerGrounded;

	private bool jump;

	[SerializeField]
	private bool airControl;

	[SerializeField]
	private float jumpForce;

	private int count;
	public Text countText;

	public Text winText;


	public AudioClip coinAudio;
	public AudioSource source;

	// Use this for initialization
	public override void Start () {
		base.Start ();

		playerRigidbody = GetComponent<Rigidbody2D> ();

		count = 0;
		SetScoreText ();
		winText.text = "";

		source = GetComponent<AudioSource>();
	}

	void Update(){

		HandleInput ();

	}
	
	// Update is called once per frame
	void FixedUpdate () {

		float horizontal = Input.GetAxis ("Horizontal"); // accesses horizontal axis


		HandleMoving (horizontal);

		FlipCharacter (horizontal);

		HandleLayers ();

		ResetValue ();

		playerGrounded = isGrounded ();



		// Fixed Update is used, as Update will be called as many times as user's computer runs FPS
	
	}

	private void HandleMoving(float horizontal) {



		if (!playerAnimator.GetBool("slide") && (playerGrounded || airControl))
		{
		playerRigidbody.velocity = new Vector2(horizontal * movementSpeed, playerRigidbody.velocity.y); // moves negative on x axis, 0 on y;
		playerAnimator.SetFloat("speed", Mathf.Abs(horizontal));

		}

		if (playerGrounded && jump) 
		{
			playerGrounded = false;
			playerRigidbody.AddForce (new Vector2 (0, jumpForce));
			playerAnimator.SetTrigger ("jump");
		}


		if ( slide && !this.playerAnimator.GetCurrentAnimatorStateInfo (0).IsName ("sliding")) {
			playerAnimator.SetBool ("slide", true);
		} 

		else if (!this.playerAnimator.GetCurrentAnimatorStateInfo (0).IsName ("sliding")) 
		{
			playerAnimator.SetBool ("slide", false);
		}

	}

	private void FlipCharacter(float horizontal)
	{
		if (horizontal > 0 && !facingRight || horizontal < 0 && facingRight) 
		{
			changeDirection ();
		}
	}

	private void HandleInput()
	{
		if (Input.GetKeyDown (KeyCode.LeftShift)) 
		{
			slide = true;
		}

		if (Input.GetKeyDown (KeyCode.Space)) 
		{
			jump = true;
		}

	}


	private void ResetValue()
	{

		if (slide && !Input.GetKey (KeyCode.LeftShift)) 
		{
			slide = false;

			// if the left shift key is not pressed, then slide will stop
		}

		jump = false;
	}

	private bool isGrounded(){

		if (playerRigidbody.velocity.y <= 0) 
		{
			foreach (Transform point in groundPoints) 
			{
				Collider2D[] colliders = Physics2D.OverlapCircleAll (point.position, groundRadius, whatIsGround);

				for (int i = 0; i < colliders.Length; i++) 
				{
					if (colliders[i].gameObject != gameObject) //if this collider isnt the player, set colliders
					{
						return true;
					}
				}
			}
		}
		return false;
	
	}

	private void HandleLayers ()

	{
		if (!playerGrounded) {
			playerAnimator.SetLayerWeight (1, 1);
		} 

		else 
		{
			playerAnimator.SetLayerWeight (1, 0);
		}

	}

	private void OnTriggerEnter2D(Collider2D other)
	{
		if (other.gameObject.CompareTag ("PickUp")) 
		{
			other.gameObject.SetActive (false);
			count = count + 100;

			SetScoreText ();
			CollectCoins ();
		}

		if (other.gameObject.CompareTag ("outOfBounds")) {

			Application.LoadLevel (2);
		}

	}

	void SetScoreText()
	{
		countText.text = "Score: " + count.ToString ();

		if (count >= 6500)
		{
			winText.text = "Brilliant! You Won!";

		}
	}

	void CollectCoins () 
	{
		source.PlayOneShot (coinAudio);
	}
}
