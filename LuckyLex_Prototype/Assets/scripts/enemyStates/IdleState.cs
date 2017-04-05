using UnityEngine;
using System.Collections;

public class IdleState : MonoBehaviour, IEnemyState {
	private enemy enemy;

	private float idleTimer;

	private float idleDuration = 10;



	public void Execute ()
	{
		Idle ();
		if (enemy.Target != null) 
		{
			enemy.ChangeState (new PatrolState());
		}
	}


	public void Enter (enemy enemy)
	{
		this.enemy = enemy;
	}


	public void Exit ()
	{
		
	}


	public void OnTriggerEnter (Collider2D other)
	{
		
	}


	private void Idle()
	{
		enemy.enemyAnimator.SetFloat ("speed", 0);

		idleTimer += Time.deltaTime;

		if (idleTimer >= idleDuration) 
		{
			enemy.ChangeState(new PatrolState());
		}
	}

}
