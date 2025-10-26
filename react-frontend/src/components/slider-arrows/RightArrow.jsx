import React from 'react'

export const RightArrow = (props) => {
  const { onClick } = props;
  return (
    <button className="slider-next-button" onClick={onClick}>
      →
    </button>
  );
}
